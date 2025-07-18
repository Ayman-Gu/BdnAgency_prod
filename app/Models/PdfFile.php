<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdfFile extends Model
{
    protected $table='pdf_files';
    protected $fillable = ['name', 'file_path'];

}
