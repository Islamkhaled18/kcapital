<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function customers_offers()
    {
        $offset = 0;
        $limit = 10;
        $sort = 'id';
        $order = 'DESC';

        if (isset($_GET['offset'])) {
            $offset = $_GET['offset'];
        }

        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        }

        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        }



        $sql = Offer::with('customer','property')->orderBy($sort, $order);


        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql->where('id', 'LIKE', "%$search%")
            ->orwhere('email', 'LIKE', "%$search%")
            ->orwhere('first_name', 'LIKE', "%$search%")
            ->orwhere('last_name', 'LIKE', "%$search%");
        }


        $total = $sql->count();

        if (isset($_GET['limit'])) {
            $sql->skip($offset)->take($limit);
        }


        $res = $sql->get();

        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $count = 1;


//('0 : Pending - 1:Accept - 2: Complete  - 3:Cancel');
        foreach ($res as $row) {

            $tempRow['id'] = $row->id;
            $tempRow['customer_name'] = $row->customer->name;
            $tempRow['property_title'] = $row->property->title;
            $tempRow['date'] = $row->date;
            $tempRow['status'] = ($row->status == 0) ? '<span class="badge rounded-pill bg-warning">Pending</span>' : (($row->status == 1) ? '<span class="badge rounded-pill bg-success">Accept</span>' : (($row->status == 2) ? '<span class="badge rounded-pill bg-info">Complete</span>' : '<span class="badge rounded-pill bg-danger">Cancel</span>'));
            $tempRow['name'] = $row->name;
            $tempRow['phone'] = $row->phone;
            $tempRow['message'] = $row->message;


            $rows[] = $tempRow;
            $count++;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }
}
