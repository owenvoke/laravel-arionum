<?php

namespace pxgamer\LaravelArionum\Console\Commands;

use Illuminate\Console\Command;
use pxgamer\Arionum\Arionum;

final class ArionumStatisticsCommand extends Command
{
    /** {@inheritdoc} */
    protected $signature = 'arionum:stats';
    /** {@inheritdoc} */
    protected $description = 'Display a list of current Arionum statistics';

    public function handle(Arionum $arionum): void
    {
        $statistics = $arionum->getNodeInfo();

        $this->output->table([], [
            ['Node Hostname', $statistics->hostname],
            ['Node Version', "{$statistics->version} (DB {$statistics->dbversion})"],
            ['Network Accounts', $statistics->accounts],
            ['Network Transactions', $statistics->transactions],
            ['Network Masternodes', $statistics->masternodes],
            ['Node Connected Peers', $statistics->peers],
        ]);
    }
}
