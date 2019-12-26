@extends('layouts.appmain')

@section('content')
<div class="jumbotron jumbotron-fluid p-0 pt-3 pb-2">
    <div class="container pl-0">
        <form class="form-inline" method="post" action="">
            <input type="search" class="form-control mb-2 mr-sm-2" id="state" name="state" placeholder="State Name">
            <input type="search" class="form-control mb-2 mr-sm-2" id="county" name="county" placeholder="County Name">
            <select class="form-control mb-2 mr-sm-2" id="doctype">
                <option value="0">Document Type</option>
                <option value='1'>County form</option>
                <option value='2'>Agreement</option>
                <option value='3'>copy of check</option>
                <option value='4'>Remote notary</option>
            </select>
            <button type="submit" class="btn bg-yellow mb-2 mr-sm-2 text-white">Search&nbsp;<i title="Search Task" class="fa fa-search text-white"></i></button>
        </form>
    </div>
    <div class="container bg-white pb-5 mb-4">
        <h2 class="float-left">Document List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Document Type</th>
                    <th>Document</th>
                    <th>Owner</th>
                    <th>State</th>
                    <th>County</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Agreement</td>
                    <td>glee.doc</td>
                    <td>Mr. xyz</td>
                    <td></td>
                    <td></td>
                    <td><i title="Delete" class="fa fa-eye"></i>&nbsp;&nbsp;<i title="Edit" class="fa fa-edit"></i></td>
                </tr>
                <tr>
                    <td>Agreement</td>
                    <td>glee.doc</td>
                    <td>Mr. xyz</td>
                    <td></td>
                    <td></td>
                    <td><i title="Delete" class="fa fa-eye"></i>&nbsp;&nbsp;<i title="Edit" class="fa fa-edit"></i></td>
                </tr>
                <tr>
                    <td>Agreement</td>
                    <td>glee.doc</td>
                    <td>Mr. xyz</td>
                    <td></td>
                    <td></td>
                    <td><i title="Delete" class="fa fa-eye"></i>&nbsp;&nbsp;<i title="Edit" class="fa fa-edit"></i></td>
                </tr>
            </tbody>
        </table>
        <ul class="pagination justify-content-end " style="margin:20px 0">
            <li class="page-item"><a class="page-link text-black" href="#"><<</a></li>
            <li class="page-item"><a class="page-link text-black" href="#">1</a></li>
            <li class="page-item"><a class="page-link text-black" href="#">2</a></li>
            <li class="page-item"><a class="page-link text-black" href="#">3</a></li>
            <li class="page-item"><a class="page-link text-black" href="#">>></a></li>
        </ul>
    </div>
</div>


@endsection
