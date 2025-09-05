<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanProposal extends Model
{
    protected $table = 'pengajuan_proposal'; // <-- tambahkan ini
    protected $fillable = ['nama', 'link'];
}
