<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 4/4/15
 * Time: 2:53 PM
 */

namespace app\Services\Implementation;


use App\Attachment;
use App\Item;
use App\Services\ID;
use App\Services\ItemService;
use Illuminate\Support\Facades\DB;

class ItemServiceImpl implements ItemService {

    public function findAll()
    {
        return Item :: all();
    }

    public function findByCategory($id)
    {
        return Item :: all() -> where( 'category_id', $id );
    }

    public function create(
        $attachments,
        $categoryId,
        $title,
        $description
    )
    {
        //- Start transaction -//
        DB :: beginTransaction();
        try {
            //- Create a new Item -//
            $item = new Item();
                $item->category_id = $categoryId;
                $item->title = $title;
                $item->description = $description;

            //- Save Item -//
            if (!$item->save()) return null;

            //- Prepare storage -//
            $path = public_path() . '/files/' .
                $item -> category_id . '/' .
                $item -> id . '/';

            //- Check existing dir -//
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            //- Save attachments -//
            foreach ($attachments as $file) {
                $attachment = new Attachment();
                    $attachment->id_item = $item->id;
                    $attachment->title = 'File(Image).';
                    $attachment->file_name = $file->getClientOriginalName();

                //- Save attachment -//
                $attachment->save();

                //- Save file -//
                $file->move(
                    $path,
                    $file->getClientOriginalName()
                );
            }

            //- Success. Commit changes -//
            DB :: commit();

            return $item;
        } catch (\Exception $e) {
            // Rollback
            DB :: rollback();

            //- Remove files -//
            foreach ($attachments as $file)
                unlink( $path . '/' . $file->getClientOriginalName() );
        }

        return null;
    }

    public function find($id)
    {
        return Item :: find($id);
    }

    public function update(
        $id,
        $attachments,
        $categoryId,
        $title,
        $description
    )
    {
        //- Start transaction -//
        DB :: beginTransaction();
        try {
            //- Create a new Item -//
            $item = Item :: find( $id );
                $item->category_id = $categoryId;
                $item->title = $title;
                $item->description = $description;

            //- Save Item -//
            if (!$item->save()) return null;

            //- Prepare storage -//
            $path = public_path() . '/files/' .
                $item -> category_id . '/' .
                $item -> id . '/';

            //- Check existing dir -//
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            //- Save attachments -//
            foreach ($attachments as $file) {
                $attachment = new Attachment();
                    $attachment->id_item = $item->id;
                    $attachment->title = 'File(Image).';
                    $attachment->file_name = $file->getClientOriginalName();

                //- Save attachment -//
                $attachment->save();

                //- Save file -//
                $file->move(
                    $path,
                    $file->getClientOriginalName()
                );
            }

            //- Success. Commit changes -//
            DB :: commit();

            return $item;
        } catch (\Exception $e) {
            // Rollback
            DB :: rollback();

            //- Remove files -//
            foreach ($attachments as $file)
                unlink( $path . '/' . $file->getClientOriginalName() );
        }

        return null;
    }

    /**
     * Delete
     *
     * @param $id   ID of Item
     *
     * @return void
     */
    public function delete( $id )
    {
        $item = Item :: find( $id );

        Item :: destroy( $id );

        $path = public_path() . '/files/' .
            $item -> category_id . '/' .
            $item -> id . '/';

        exec( "rm -rf " . $path );
    }
}