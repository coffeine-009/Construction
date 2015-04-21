<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {

	//

    public function item() {
        return $this->belongsTo('App\Item', 'id_item');
    }
}
