<?php

namespace Modules\Ruleable\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Iprofile\Transformers\DepartmentTransformer;


class RuleTransformer extends JsonResource
  {
  public function toArray($request)
    {
      $data = [
        'id' => $this->when($this->id, $this->id),
        'status' => $this->status,
        'name' => $this->when($this->name, $this->name),
        'values' => $this->when($this->values, $this->values),
        'type' => $this->when($this->type, $this->type),
        'ruleable' => $this->ruleable,
        'createdAt' => $this->when($this->created_at, $this->created_at),
        'updatedAt' => $this->when($this->updated_at, $this->updated_at),
      ];

      return $data;

    }
}
