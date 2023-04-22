<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDescription extends Model
{
    use HasFactory;
    protected $table = 'invoice_description';

    protected $fillable = [
        's_no',
        'service_description',
        'hsn_code',
        'periodicity1',
        'periodicity2',
        'rate',
        'amount',
        'gst',
        'taxable_value',
        'invoice_no'
    ];
}
