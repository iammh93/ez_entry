<?php

namespace App\Domain\Steps;

use Illuminate\Http\Request;

class Steps {
    protected $request;
    protected $step;
    protected $name;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function step($name, $step) {
        $this->name = $name;
        $this->step = $step;

        return $this;
    }

    public function key() {
        return "multistep.{$this->name}";
    }

    /**
     * Get Data in selected step
     *
     * @param  String $selected_step
     * @return array
     */
    public function dataInStep($selected_step = null) {
        if ($selected_step) {
            $step_collection = collect($this->request->session()->get($this->key()));
            $selected_step_details = $step_collection->filter(function ($value, $key) use($selected_step) {
                if ($key == $selected_step) {
                    return $value;
                }
            });

            $merged_selected_step_details = call_user_func_array('array_merge', $selected_step_details->pluck("data")->toArray());

            return $merged_selected_step_details;
        }

        //return all
        return collect($this->request->session()->get($this->key()))
                ->pluck("data");
    }

    /**
     * Get Data in all step
     *
     * @return array
     */
    public function all() {
        $merged_data = [];
        $data_list  = $this->dataInStep();
        foreach($data_list as $data) {
            if ($data !== null) {
                $merged_data = array_merge($merged_data, $data);
            }
        }
        return $merged_data;
    }

    public function clearAllData() {
        $this->request->session()->forget($this->key());

        return $this;
    }

    public function store($data = []) {
        $this->request->session()->put($this->key() . ".{$this->step}.data", $data);
        return $this;
    }

    public function complete() {
        $this->request->session()->put($this->key() . ".{$this->step}.complete", true);
        return $this;
    }

    public function __get($property) {
        return $this->request->session()->get($this->key() . ".{$this->step}.data.{$property}");
    }

    public function notCompleted(...$steps) {
        foreach($steps as $step) {
            if (!$this->request->session()->get($this->key() . ".{$step}.complete")) {
                return true;
            }
        }
        return false;
    }
}
