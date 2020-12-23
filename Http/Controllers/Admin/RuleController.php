<?php

namespace Modules\Ruleable\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ruleable\Entities\Rule;
use Modules\Ruleable\Http\Requests\CreateRuleRequest;
use Modules\Ruleable\Http\Requests\UpdateRuleRequest;
use Modules\Ruleable\Repositories\RuleRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class RuleController extends AdminBaseController
{
    /**
     * @var RuleRepository
     */
    private $rule;

    public function __construct(RuleRepository $rule)
    {
        parent::__construct();

        $this->rule = $rule;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$rules = $this->rule->all();

        return view('ruleable::admin.rules.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ruleable::admin.rules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRuleRequest $request
     * @return Response
     */
    public function store(CreateRuleRequest $request)
    {
        $this->rule->create($request->all());

        return redirect()->route('admin.ruleable.rule.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ruleable::rules.title.rules')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Rule $rule
     * @return Response
     */
    public function edit(Rule $rule)
    {
        return view('ruleable::admin.rules.edit', compact('rule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Rule $rule
     * @param  UpdateRuleRequest $request
     * @return Response
     */
    public function update(Rule $rule, UpdateRuleRequest $request)
    {
        $this->rule->update($rule, $request->all());

        return redirect()->route('admin.ruleable.rule.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ruleable::rules.title.rules')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Rule $rule
     * @return Response
     */
    public function destroy(Rule $rule)
    {
        $this->rule->destroy($rule);

        return redirect()->route('admin.ruleable.rule.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ruleable::rules.title.rules')]));
    }
}
