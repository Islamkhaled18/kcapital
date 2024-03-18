@extends('layouts.main')

@section('title')
Customers Offers
@endsection

@section('page-title')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>@yield('title')</h4>

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">

        </div>
    </div>
</div>
@endsection


@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">

        </div>


        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <table class="table table-borderless" aria-describedby="mydesc" class='table-striped'
                        id="table_list" data-toggle="table" data-url="{{ url('get_customers_offers') }}"
                        data-click-to-select="true" data-side-pagination="server" data-pagination="true"
                        data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true" data-toolbar="#toolbar"
                        data-show-columns="true" data-show-refresh="true" data-fixed-columns="true"
                        data-fixed-number="1" data-fixed-right-number="1" data-trim-on-search="false"
                        data-responsive="true" data-sort-name="id" data-sort-order="desc"
                        data-pagination-successively-size="3" data-query-params="queryParams">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-align="center">ID</th>
                                <th scope="col" data-field="customer_name" data-sortable="true" data-align="center">Customer Name
                                </th>
                                <th scope="col" data-field="property_title" data-sortable="true" data-align="center">Property Name</th>

                                <th scope="col" data-field="date" data-sortable="true" data-align="center">Date
                                </th>

                                <th scope="col" data-field="status" data-sortable="true" data-align="center">
                                    {{ __('Status') }}
                                </th>
                                <th scope="col" data-field="name" data-sortable="true" data-align="center">
                                    {{ __('Status') }}
                                </th>
                                <th scope="col" data-field="phone" data-sortable="true" data-align="center">
                                    {{ __('Phone') }}
                                </th>
                                <th scope="col" data-field="message" data-sortable="true" data-align="center">
                                    {{ __('Message') }}
                                </th>


                                <th scope="col" data-field="operate" data-sortable="false" data-align="center">
                                    {{ __('Action') }}</th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>


    </div>
</section>







@endsection

@section('script')
<script>
    function queryParams(p) {

    return {
    sort: p.sort,
    order: p.order,
    offset: p.offset,
    limit: p.limit,
    search: p.search,

    };
    }
</script>
@endsection
