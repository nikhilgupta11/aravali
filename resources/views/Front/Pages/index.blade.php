@extends('Front/Layouts/Layout/HomeLayout')
@section('HomeContent')
<table class="table" style="width:100%;background:lightgoldenrodyellow">
    <thead>
        <tr>
            <th scope="col" style="width:9%">Sr. No.</th>
            <th scope="col" style="width:40%">Post (Contractual Basis)</th>
            <th scope="col" style="width:40%">Eligibility</th>
            <th scope="col" style="width:11%">Apply Link</th>
        </tr>
    </thead>
    <?php

    use Carbon\Carbon;
    ?>
    @if(count($data)>0)
    @foreach($data->keys() as $depart)
    <tbody>
        <tr>
            <td colspan="4">@foreach($department as $department1)
                @if($depart == $department1->id)
                <p><b>{{$department1->name}}</b></p>
                @endif
                @endforeach
            </td>
        </tr>
        @foreach($data[$depart] as $index=>$job)
        @if(Carbon::parse($job->end_date)->gte(Carbon::now()->format('Y-m-d')))
        <tr>
            <td class="lineTable">{{ $index+1 }}</td>
            <td class="lineTable">{{$job->job_title}} <br>
                <p class="endDateRed">End Date: {{date("d" , strtotime($job->end_date)).'th'}},{{ date("M" , strtotime($job->end_date)) }} {{ date("y" , strtotime($job->end_date))}}</p>
            </td>
            <td class="lineTable">
                Position - {{$job->no_of_post}} <br>
                {{$job->description}}
            </td>
            <td class="lineTable"> <a href="{{ route('Submit-Form', $job->id) }}" class="btn btn-primary">Apply Now</a></td>
        </tr>
        @endif
        @endforeach
    </tbody>
    @endforeach
    @else
    <tbody>
        <tr>
            <td></td>
            <td class="textCenter">
                <p><b>No Job Available.</b></p>
            </td>
        </tr>
    </tbody>
    @endif
</table>
<!-- HOME END-->
<style>
    table.table {
        margin-top: 100px;
        margin-bottom: 100px;

    }

    .textCenter {
        text-align: center;
    }

    .lineTable {
        border: 2px solid black;
    }

    .table td {
        border-top: 2px solid black;
    }

    .table thead th {
        border: 2px solid black;
    }

    .deparmetntName {
        width: 100%;
    }

    tr {
        border: 2px solid black;
    }

    .endDateRed {
        color: red;
    }
</style>
@endsection('HomeContent')