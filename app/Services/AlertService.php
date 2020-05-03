<?php


namespace App\Services;


class AlertService
{
    public function saveAlert($for)
    {
        $this->alert($for, 'saved');
    }

    public function updateAlert($for)
    {
        $this->alert($for, 'updated');
    }

    public function deleteAlert($for)
    {
        $this->alert($for, 'deleted');
    }

    private function alert($for, $action)
    {
        if ($for) {
            session()->flash('success', 'Successfully ' . $action . '!');
        } else {
            session()->flash('error', 'Something went wrong! please try again later.');
        }
    }
}
