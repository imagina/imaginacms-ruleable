<?php
namespace Modules\Ruleable\Traits;

use Modules\Ruleable\Entities\Rule;

trait RuleableTrait
{
  /**
   * {@inheritdoc}
   */
  protected static $rulesModel = Rule::class;

  /**
   * {@inheritdoc}
   */
  public static function getRulesModel()
  {
    return static::$rulesModel;
  }

  /**
   * {@inheritdoc}
   */
  public static function setRulesModel($model)
  {
    static::$rulesModel = $model;
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return $this->morphToMany(static::$rulesModel, 'ruleable', 'ruleable__ruleable', 'ruleable_id', 'rule_id');
  }

  /**
   * {@inheritdoc}
   */
  public static function createRulesModel()
  {
    return new static::$rulesModel;
  }

  /**
   * {@inheritdoc}
   */
  public static function allRules()
  {
    $instance = new static;

    return $instance->createRulesModel()->whereNamespace($instance->getEntityClassName());
  }

  /**
   * {@inheritdoc}
   */
  public function rule($rules)
  {
    foreach ($rules as $rule) {
      $this->addRule($rule);
    }
    return true;
  }

  /**
   * {@inheritdoc}
   */
  public function addRule($ruleId)
  {
    $rule = Rule::find($ruleId);
    if ($this->rules->contains($rule->id) === false) {
      $this->rules()->attach($rule);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function unrule($rules = null)
  {
    $rules = $rules ?: $this->rules->pluck('id')->all();

    foreach ($rules as $rule) {
      $this->removeRule($rule->id);
    }

    return true;
  }

  /**
   * {@inheritdoc}
   */
  public function removeRule($ruleD)
  {
    $rule = $this->createRulesModel()
      ->where('id', $ruleD->id)
      ->first();

    if ($rule) {
      $this->rules()->detach($rule);
    }
  }

}
