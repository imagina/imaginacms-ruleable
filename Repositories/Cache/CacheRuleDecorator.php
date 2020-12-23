<?php

namespace Modules\Ruleable\Repositories\Cache;

use Modules\Ruleable\Repositories\RuleRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheRuleDecorator extends BaseCacheDecorator implements RuleRepository
{
    public function __construct(RuleRepository $rule)
    {
        parent::__construct();
        $this->entityName = 'ruleable.rules';
        $this->repository = $rule;
    }
}
