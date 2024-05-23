<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Book;

class BookController extends Controller
{
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::get();
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $book = new Book;
            $book->fill($request->validated())->save();
        
            return $book;

        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
        }
    }



    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
            $book = Book::find($id);
            $book->fill($request->validated())->save();

            return $book;
        } catch(\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
        }
    }

    /**
     * Remove the specified item from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(null, 204);
    }
}