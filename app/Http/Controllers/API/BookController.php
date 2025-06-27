<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Book;
use OpenApi\Annotations as OA;

/**
 * Class BookController.
 *
 * @author gilberthvittho <gilberh.422024003@ukrida.ac.id>
 */
class BookController extends Controller
{
    /**
 * @OA\Get(
 *     path="/api/book",
 *     tags={"book"},
 *     summary="Display a listing of items",
 *     operationId="index",
 *     @OA\Response(
 *         response=200,
 *         description="successful",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Parameter(
 *         name="_page",
 *         in="query",
 *         description="current page",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             example=1
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="_limit",
 *         in="query",
 *         description="max item in a page",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64",
 *             example=10
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="_search",
 *         in="query",
 *         description="word to search",
 *         required=false,
 *         @OA\Schema(
 *             type="string",
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="_publisher",
 *         in="query",
 *         description="search by publisher like name",
 *         required=false,
 *         @OA\Schema(
 *             type="string",
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="_sort_by",
 *         in="query",
 *         description="word to search",
 *         required=false,
 *         @OA\Schema(
 *             type="string",
 *             example="latest"
 *         )
 *     ),
 * )
 */
public function index(Request $request)
{
    try {
        $data['filter'] = $request->all();
        $page = (int) ($data['filter']['_page'] ?? 1);
        $limit = (int) ($data['filter']['_limit'] ?? 10); 
        $offset = ($page - 1) * $limit;

        $query = Book::query();

        if ($request->get('_search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->get('_search') . '%')
                  ->orWhere('author', 'like', '%' . $request->get('_search') . '%');
            });
        }

        if ($request->get('_publisher')) {
            $query->where('publisher', 'like', '%' . $request->get('_publisher') . '%');
        }

        if ($request->get('_sort_by')) {
            switch ($request->get('_sort_by')) {
                case 'latest_publication':
                    $query->orderBy('publication_year', 'DESC');
                    break;
                case 'latest_added':
                    $query->orderBy('created_at', 'DESC');
                    break;
                case 'title_asc':
                    $query->orderBy('title', 'ASC');
                    break;
                case 'title_desc':
                    $query->orderBy('title', 'DESC');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'ASC');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'DESC');
                    break;
            }
        }

        $data['products_count_total'] = $query->count();
        $data['products'] = $query->limit($limit)->offset($offset)->get();
        $data['products_count_search'] = ($data['products_count_total'] == 0 ? 0 : (($page - 1) * $limit) + 1);
        $data['products_count_end'] = ($data['products_count_total'] == 0 ? 0 : (($page - 1) * $limit) + count($data['products']));

        return response()->json($data, 200);

    } catch (\Exception $exception) {
        throw new HttpException(500, 'Invalid data : ' . $exception->getMessage());
    }
}

    


    public function store(Request $request)
{
    try {
        $data = $request->json()->all();
        $validator = Validator::make($data, [
            'title'  => 'required|unique:books',
            'author' => 'required|max:100',
        ]);
        if ($validator->fails()) {
            throw new HttpException(400, $validator->messages()->first());
        }
        
        $book = new Book;
        $book->fill($request->all());
        $book->created_by = \Auth::user()->id; // Store the user ID
        $book->save();

        return response()->json(array('message' => 'Saved successfully', 'data' => $book), 200);
    } catch (\Exception $exception) {
        throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
    }
}


    /**
     * @OA\Get(
     *      path="/api/book/{id}",
     *      tags={"book"},
     *      summary="Display the specified item",
     *      operationId="show",
     *      @OA\Response(
     *          response=404,
     *          description="Item not found",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid input",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of item that needs to be displayed",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json(array('message' => 'Data detail retrieved successfully', 'data' => $book), 200);
    }

    /**
     * @OA\Put(
     *      path="/api/book/{id}",
     *      tags={"book"},
     *      summary="Update the specified item",
     *      operationId="update",
     *      @OA\Response(
     *          response=404,
     *          description="Item not found",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid input",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of item that needs to be updated",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Request body description",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/Book",
     *              example={"title": "Eating Clean", "author": "Inge Tumiwa-Bachrens", "publisher": "Kawan Pustaka", "publication_year": "2016", "cover": "https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1482170055/33511107.jpg", "description": "Menjadi sehat adalah impian semua orang. Makanan yang selama ini kita pikir sehat ternyata belum tentu 'sehat' bagi tubuh kita.", "price": 85000}
     *          )
     *      )
     * )
     */
    public function update(Request $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $book = Book::find($id);
        if (!$book) {
            throw new HttpException(404, "Item not found");
        }

        try {
            $book->fill($request->all());
            $book->update_by = \Auth::user()->id;
            $book->save();
            return response()->json(array('message' => 'Updated successfully', 'data' => $book), 200);
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/book/{id}",
     *      tags={"book"},
     *      summary="Remove the specified item",
     *      operationId="destroy",
     *      @OA\Response(
     *          response=404,
     *          description="Item not found",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid input",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of item that needs to be removed",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book-> delete_by = \Auth::user()->id;
        $book->delete();

        return response()->json(array('message' => 'Deleted successfully', 'data' => $book), 204);
    }
}