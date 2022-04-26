<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentAttachment extends Model
{
    protected $table = 'parents_attachments';

    protected $guard = 'id';

    protected $fillable =['file_name', 'parent_id'];

    protected $hidden = ['id', 'parent_id'];

    protected $dates = ['created_at' , 'updated_at'];

    public $timestamps = true;

    public function MyParent()
    {
        return $this->belongsTo(MyParent::class, 'parent_id');
    }
}
