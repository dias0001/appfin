<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fin_movimento extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'valor', 'tipo', 'user_id'];
    //definir relacionamento c/ tabela de usuários
    public function user(){
        return $this->belongsTo('App/Model/user');
    }
    
}
