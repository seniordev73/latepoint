<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StepSetting;


class Steps extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $check = [];
        $value = [];
        $select_location = StepSetting::query()
            ->where('label', 'LIKE', "%select_location%")
            ->get();
        $select_location_check = $select_location->count();
        $check['select_location_check'] = $select_location_check;
        if ($select_location_check > 0) {
            $value['select_location'] = $select_location[0];
        } else {
            $value['select_location'] = '';
        }

        $select_service = StepSetting::query()
            ->where('label', 'LIKE', "%select_service%")
            ->get();
        $select_service_check = $select_service->count();
        $check['select_service_check'] = $select_service_check;
        if ($select_service_check > 0) {
            $value['select_service'] = $select_service[0];
        } else {
            $value['select_service'] = '';
        }

        $select_service_extra = StepSetting::query()
            ->where('label', 'LIKE', "%select_service_extra%")
            ->get();
        $select_service_extra_check = $select_service_extra->count();
        $check['select_service_extra_check'] = $select_service_extra_check;
        if ($select_service_extra_check > 0) {
            $value['select_service_extra'] = $select_service_extra[0];
        } else {
            $value['select_service_extra'] = '';
        }

        $custom_fields = StepSetting::query()
            ->where('label', 'LIKE', "%custom_fields%")
            ->get();
        $custom_fields_check = $custom_fields->count();
        $check['custom_fields_check'] = $custom_fields_check;
        if ($custom_fields_check > 0) {
            $value['custom_fields'] = $custom_fields[0];
        } else {
            $value['custom_fields'] = '';
        }

        $select_agent = StepSetting::query()
            ->where('label', 'LIKE', "%select_agent%")
            ->get();
        $select_agent_check = $select_agent->count();
        $check['select_agent_check'] = $select_agent_check;
        if ($select_agent_check > 0) {
            $value['select_agent'] = $select_agent[0];
        } else {
            $value['select_agent'] = '';
        }

        $select_date_time = StepSetting::query()
            ->where('label', 'LIKE', "%select_date_time%")
            ->get();
        $select_date_time_check = $select_date_time->count();
        $check['select_date_time_check'] = $select_date_time_check;
        if ($select_date_time_check > 0) {
            $value['select_date_time'] = $select_date_time[0];
        } else {
            $value['select_date_time'] = '';
        }

        $enter_information = StepSetting::query()
            ->where('label', 'LIKE', "%enter_information%")
            ->get();
        $enter_information_check = $enter_information->count();
        $check['enter_information_check'] = $enter_information_check;
        if ($enter_information_check > 0) {
            $value['enter_information'] = $enter_information[0];
        } else {
            $value['enter_information'] = '';
        }

        $select_payment_method = StepSetting::query()
            ->where('label', 'LIKE', "%select_payment_method%")
            ->get();
        $select_payment_method_check = $select_payment_method->count();
        $check['select_payment_method_check'] = $select_payment_method_check;
        if ($select_payment_method_check > 0) {
            $value['select_payment_method'] = $select_payment_method[0];
        } else {
            $value['select_payment_method'] = '';
        }

        $verify_order_details = StepSetting::query()
            ->where('label', 'LIKE', "%verify_order_details%")
            ->get();
        $verify_order_details_check = $verify_order_details->count();
        $check['verify_order_details_check'] = $verify_order_details_check;
        if ($verify_order_details_check > 0) {
            $value['verify_order_details'] = $verify_order_details[0];
        } else {
            $value['verify_order_details'] = '';
        }

        $confirmation = StepSetting::query()
            ->where('label', 'LIKE', "%confirmation%")
            ->get();
        $confirmation_check = $confirmation->count();
        $check['confirmation_check'] = $confirmation_check;
        if ($confirmation_check > 0) {
            $value['confirmation'] = $confirmation[0];
        } else {
            $value['confirmation'] = null;
        }

        $custom_setting = StepSetting::query()
            ->where('label', 'LIKE', "%bookingformsetting%")
            ->get();
        $custom_setting_check = $custom_setting->count();
        $check['custom_setting_check'] = $custom_setting_check;
        if ($custom_setting_check > 0) {
            $value['custom_setting'] = $custom_setting[0];
        } else {
            $value['custom_setting'] = '';
        }



        return view('content.settings.steps', compact('value', 'check'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $checkVal = StepSetting::query()
            ->where('label', 'LIKE', "%bookingformsetting%")
            ->get();
        $check = $checkVal->count();
        if ($check == 0) {
            $step = new StepSetting;
            $step->label = "bookingformsetting";
            $step->value = serialize($request->settings);
            $step->step = "custom_setting";
        } else {
            $id = $checkVal[0]->id;
            $step = StepSetting::findOrFail($id);
            $step->value = serialize($request->settings);
        }
        $step->save();
        return redirect('/settings/steps')->with('success', 'Step created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $steptitle = $request->title;
        $checkVal = StepSetting::query()
            ->where('label', 'LIKE', "%{$steptitle}%")
            ->get();
        $check = $checkVal->count();

        if ($check == 0) {
            $step = new StepSetting;
            $step->label = $request->title;
            $step->value = serialize($request->step);
            $step->step = $request->step['name'];
        } else {
            $id = $checkVal[0]->id;
            $step = StepSetting::findOrFail($id);
            $step->value = serialize($request->step);
            $step->step = $request->step['name'];
        }

        $step->save();

        return redirect('/settings/steps')->with('success', 'Step created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
