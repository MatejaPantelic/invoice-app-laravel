<?php

use Illuminate\Validation\Rule;

return [
    'create_client' => [
        'validation_rules' => [
            'tin_jmbg'=>['required','min:9','max:13','regex:/^[0-9]+$/','unique:App\Models\Client,tin_jmbg'],
            'activity_code'=>['nullable','size:4','regex:/^[0-9]+$/'],
            'company_name'=>['nullable','max:100'],
            'bank_account'=>['required','size:18','regex:/^[0-9]+$/','unique:App\Models\Client,bank_account'],
            'phone_number' => ['required','string','max:18','regex:/^([0-9\s\/\-\+\(\)]*)$/'],
            'name'=>['required','alpha','max:50'],
            'surname'=>['required','alpha','max:50'],
            'address'=>['required','max:200'],
            'city'=>['required','alpha'],
            'email'=>['required','email','unique:App\Models\Client,email'],
        ]
    ],
    'update_client' => [
        'validation_rules' => [
            'tin_jmbg' => ['required', 'string', 'min:9','max:13', 'regex:/^[0-9]+$/'],
            'activity_code'=>['nullable','size:4','regex:/^[0-9]+$/'],
            'bank_account'=>['required','size:18','regex:/^[0-9]+$/'],
            'phone_number' => ['required','string','max:18','regex:/^([0-9\s\/\-\+\(\)]*)$/'],
            'name' => ['required','alpha','max:50'],
            'surname' => ['required','alpha','max:50'],
            'company_name'=>['nullable','max:100'],
            'address' => ['required','max:200'],
            'city' => ['required','alpha'],
            'email' => ['required','email'],
        ]
    ],
    'create_invoice' => [
        'validation_rules' => [
            'user_id'=> ['required', 'integer'],
            'client_id'=> ['required', 'integer'],
            'company_id'=> ['required', 'integer'],
            'invoice_number'=> ['required', 'string', 'min:5', 'max:15', 'unique:App\Models\Invoice,invoice_number'],
            'payment_term'=> ['required', 'date', 'after_or_equal:today'],
            'description'=> ['nullable', 'string', 'min:0', 'max:80'],
        ]
    ],
    'user_register' => [
        'validation_rules' => [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone_number' => ['required','string','max:18','regex:/^([0-9\s\/\-\+\(\)]*)$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_id' => ['required'],
            'is_approved' => ['required'],
        ]
    ],
    'create_invoice_item' => [
        'validation_rules' => [
            'quantity'=> ['required', 'integer','digits_between:1,4'],
            'title' => ['required', 'string', 'max:70'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'description' => ['nullable', 'string', 'max:150'],
            'total_price'=> ['required', 'numeric'],
            'unit_of_measure_id' => ['required', 'integer'],
            'invoice_id' => ['required', 'integer'],
        ]
    ],
    'user_edit' => [
        'validation_rules' => [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone_number' => ['required','string','max:18','regex:/^([0-9\s\/\-\+\(\)]*)$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]
    ],
    'create_company'=>[
        'validation_rules'=>[
            'tin'=> ['required', 'unique:App\Models\Company,tin','max:9'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:50'],
            'city' => ['required', 'alpha'],
            'phone_number' => ['required','string','max:18','regex:/^([0-9\s\/\-\+\(\)]*)$/'],
            'bank_account' => ['required','size:18','regex:/^[0-9]+$/','unique:App\Models\Company,bank_account'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Models\Company,email'],
        ]
    ],
    'update_company'=>[
        'validation_rules'=>[
            'tin'=> ['required','max:9'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:200'],
            'city' => ['required', 'alpha'],
            'phone_number' => ['required','string','max:18','regex:/^([0-9\s\/\-\+\(\)]*)$/'],
            'bank_account' => ['required','size:18','regex:/^[0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]
    ],

];
