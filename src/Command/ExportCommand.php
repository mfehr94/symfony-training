<?php


namespace App\Command;


use App\Export\Gateway;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ExportCommand extends Command
{
    /**
     * @var Gateway
     */
    private $gateway;

    public function __construct(Gateway $gateway, string $name = null)
    {
        parent::__construct($name);
        $this->gateway = $gateway;
    }

    protected function configure()
    {
     $this
         ->setName('app:export')
         ->setDescription('Exports entities to file.')
         ->addArgument('entity', InputArgument::REQUIRED, 'FQCN of the entity');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
       $entity = $input->getArgument('entity');
       $nameArray = explode('\\', $entity);
       $fileName = end($nameArray);

       $this->gateway->export($entity, strtolower( $fileName . '.csv'));

       $ui = new SymfonyStyle($input, $output);

       $ui->note('You are exporting ' . $entity);
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('entity')) {
            $ui = new SymfonyStyle($input, $output);
            $entity = $ui->ask('Which entity would you like to export?');

            $input->setArgument('entity', $entity);
        }
    }
}
