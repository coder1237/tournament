<?php

namespace App\Rules;

use App\Setting;
use App\Team;
use Illuminate\Contracts\Validation\Rule;

class CheckGroupSize implements Rule
{
    protected $groupId;
    protected $teamId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($groupId,$teamId)
    {
        $this->groupId = $groupId;
        $this->teamId = $teamId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $setting = Setting::first();
        $teamRegistrations = Team::where('group_id',$this->groupId);
        if(!empty($this->teamId)){
            $teamRegistrations = $teamRegistrations->where('id','!=',$this->teamId);
        }
        $teamRegistrations = $teamRegistrations->get();
        if($setting->group_size < (count($teamRegistrations)+1)){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This Group is full please select another';
    }
}
