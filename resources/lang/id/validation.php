<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'Kolom :attribute kudu disi.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'nama_bahan' => [
            'required' => 'Kolom nama bahan baku kudu disi.',
            'string' => 'Kolom nama bahan baku isine kudu berupa string.',
            'max' => 'Kolom nama bahan baku paling akeh 20 karakter.',
        ],

        'harga_bahan' => [
            'required' => 'Kolom harga bahan baku kudu disi.',
            'string' => 'Kolom harga bahan baku isine kudu berupa string.',
        ],

        'jumlah_bahan' => [
            'required' => 'Kolom jumlah bahan baku kudu disi.',
            'string' => 'Kolom jumlah bahan baku isine kudu berupa string.',
        ],

        'stok_bahan' => [
            'required' => 'Kolom stok bahan baku kudu disi.',
            'string' => 'Kolom stok bahan baku isine kudu berupa string.',
        ],

        'nama_supplier' => [
            'required' => 'Kolom Nama Supplier kudu disi.',
            'string' => 'Kolom Nama Supplier isine kudu berupa string.',
            'max' => 'Kolom Nama Supplier paling akeh 20 karakter',
        ],

        'alamat' => [
            'required' => 'Kolom Alamat kudu disi.',
            'string' => 'Kolom Alamat isine kudu berupa string.',
            'max' => 'Kolom Alamat paling akeh 30 karakter',
        ],

        'no_hp' => [
            'string' => 'Kolom Nomer Hp isine kudu berupa string.',
            'max' => 'Kolom Nomer Hp paling akeh 14 karakter',
        ],

        'nama_produk' => [
            'required' => 'Kolom Nama Produk kudu disi.',
            'string' => 'Kolom Nama Produk isine kudu berupa string.',
            'max' => 'Kolom Nama Produk paling akeh 20 karakter',
        ],

        'harga_produk' => [
            'required' => 'Kolom Harga Produk kudu disi.',
            'string' => 'Kolom Harga Produk isine kudu berupa string.',
        ],

        'satuan_produk' => [
            'required' => 'Kolom Satuan Produk kudu disi.',
            'string' => 'Kolom Satuan Produk isine kudu berupa string.',
        ],

        'tanggal_pembelian' => [
            'required' => 'Kolom Tanggal Pembelian kudu disi.',
            'date' => 'Kolom Tanggal Pembelian isine kudu berupa date.',
        ],

        'tanggal_penjualan' => [
            'required' => 'Kolom Tanggal Penjualan disi disit bos..',
            'date' => 'Kolom Tanggal Penjualan isine kudu berupa date.',
        ],

        'kode_jual' => [
            'required' => 'Kolom kode penjualan kudu disi.',
            'string' => 'Kolom Kode Jual isine kudu berupa string.',
        ],

        'jumlah' => [
            'required' => 'Kolom Jumlah kudu disi.',
            'string' => 'Kolom Jumlah isine kudu berupa string.',
        ],

        'total_bayar' => [
            'required' => 'Kolom Total Bayar kudu disi.',
            'string' => 'Kolom Total Bayar isine kudu berupa string.',
        ],

        'email' => [
            'required' => 'Nama email kudu disi.',
            'email' => 'Email kudu valid.',
            'max' => 'Email maksimal 100 huruf',
            'unique' => 'Email wez ana sing pada',
        ],

        'password' => [
            'confirmed' => 'Password ora cocok karo kolom konfirmasi password.',
            'min' => 'Password minimal 6 karakter ndul.',
        ],

        'foto' => [
            'image' => 'Hanya bisa file gambar cuk...',
            'max' => 'Kapasitas foto tidak boleh lebih dari 4MB..',
            'mimes' => 'Kolom foto hanya bisa diisi file *.jpg, *.jpeg, *.bmp, *.png.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
