<?php

declare(strict_types=1);

namespace Gtto\Apps\Backoffice\Frontend\Command;

use Gtto\Backoffice\Crushes\Infrastructure\Persistence\ElasticsearchBackofficeCrushRepository;
use Gtto\Backoffice\Crushes\Infrastructure\Persistence\MySqlBackofficeCrushRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ImportCrushesToElasticsearchCommand extends Command
{
    private MySqlBackofficeCrushRepository         $mySqlRepository;
    private ElasticsearchBackofficeCrushRepository $elasticRepository;

    public function __construct(
        MySqlBackofficeCrushRepository $mySqlRepository,
        ElasticsearchBackofficeCrushRepository $elasticRepository
    ) {
        parent::__construct();

        $this->mySqlRepository   = $mySqlRepository;
        $this->elasticRepository = $elasticRepository;
    }

    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $crushes = $this->mySqlRepository->searchAll();

        foreach ($crushes as $crush) {
            $this->elasticRepository->save($crush);
        }
    }
}
