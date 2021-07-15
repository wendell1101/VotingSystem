@extends('layouts.app')

@section('content')

<div class="container py-5" style="min-height: 92vh">
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-primary">Candidates</h2>
        </div>
        <div class="col-md-6">
            <form class="" method="GET" id="searchForm">
                @csrf
                <div class="form-group">
                    <!-- <label for="q">Search Candidate</label> -->
                    <div class="row ml-auto align-items-center">
                        <div class="col">
                            <input type="text" name="q" id="search-input" class="form-control border-top border-left border-right" placeholder="Search candidate..." autofocus>
                        </div>
                        <div class="col" id="searchIcon">
                            <i class="fas fa-search text-primary" style="font-size:1.3rem"></i>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <h5 id="search-results"></h5>


    </div>

    <div class="row" id="candidates">


        @if($candidates->count() > 0)

        @foreach($candidates as $candidate)
        <div class="col-md-4 p-2" id="candidate-lists">
            <div class="card">
                <div class="card-header text-center">
                    <img src="{{ asset('storage/candidate_images/' . $candidate->image) }}" class="rounded-circle" alt="image" width="80px" height="80px">
                    <div class="card-body text-center">
                        <h4 class="text-primary font-weight-bold">{{ $candidate->name }}</h4>
                        <p class="text-warning">{{ $candidate->getOfficerName($candidate->officer_id) }}</p>
                        <p class="text-dark">{{ $candidate->getPartylistName($candidate->partylist_id) }}</p>
                        <span class="btn btn-primary btn-sm " id="btn-more-info" data-toggle="modal" data-target="#infoModal" onclick="showInfo({{ $candidate }})">More Info</span>
                    </div>


                </div>
                <!-- Modal -->
                <div class="modal fade" id="infoModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-primary" id="exampleModalLabel">More Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center" id="modal-contents">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endforeach

        @else
        <h2 class="text-secondary"> No Candidate Yet</h2>
        @endif
    </div>
</div>


@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const btnMoreInfo = document.getElementById('btn-more-info');
    const moreInfo = document.getElementById('more-info');
    const modalContent = document.getElementById('modal-contents');
    const infoModal = document.getElementById('infoModal2')

    function showInfo(candidate) {
        let asset = "{{ asset('storage/candidate_images/')}}";
        let image = `/${candidate.image}`;
        let assetImage = asset + image;

        modalContent.innerHTML = `
        <div class="d-flex justify-content-center mb-2">
                                <img src="${assetImage}" alt="image" class="rounded-circle mx-auto" style="width:80px; height:80px">
                            </div>
            <p>Name : ${candidate.name} </p>
            <p>Course and Section : ${candidate.course_and_section}</p>
            <p>Description: ${candidate.description}</p>
            <p>Platform: ${candidate.platform}</p>
            `;
        $('#infoModal2').modal('show');
    }


    //Search Candidates
    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            let q = $(this).val();
            console.log(q);
            q ? $('#search-results').html(`Results for <b>"${q}"</b>`) : $('#search-results').html('');
            //set up delay
            setTimeout(function() {
                $.ajax({
                    url: '/search',
                    data: {
                        q: q,
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        // $('#search-results').html('loading... ');
                    },
                    success: function(res) {
                        // console.log(res);
                        let html = '';
                        let searchResult = document.getElementById('search-result');

                        // searchResult += res.data.forEach(function(candidate) {
                        //     searchResult += `
                        //     ${candidate.name}
                        // `;
                        // })

                        const candidates = document.getElementById('candidates');
                        candidates.innerHTML = '';
                        const img_path = "storage/candidate_images/";

                        if (res.data.length != 0) {
                            q ? $('#search-results').html(`Results for <b>"${q}"</b>`) : $('#search-results').html('');
                            res.data.forEach(function(candidate) {





                                // let showInfo = "onclick=showInfo(" + candidate + ")";
                                candidates.innerHTML += `
                            <div class="col-md-4 p-2" id="candidate-lists">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <img src="${img_path}/${candidate.image}" class="rounded-circle" alt="image" width="80px" height="80px">
                                            <div class="card-body text-center">
                                                <h4 class="text-primary font-weight-bold">${candidate.name}</h4>
                                                <p class="text-warning">${candidate.officer_name}</p>
                                                <p class="text-dark">${candidate.partylist_name}</p>
                                                <span class="btn btn-primary btn-sm " id="btn-more-info" data-toggle="modal" data-target="#infoModal" onclick="showInfo2(${candidate})">More Info</span>
                                            </div>


                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="infoModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-primary" id="exampleModalLabel">More Information</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center" id="modal-contents">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            `


                            })


                        } else {
                            $('#search-results').html(`No results found for <b>"${q}"</b>`);
                        }

                    }
                })
            }, 0)
        })
    })

    function showInfo2(candidate) {

        console.log(candidate);
        const moreInfo = document.getElementById('more-info');
        const modalContent = document.getElementById('modal-contents');
        console.log(candidate);
        let asset = "{{ asset('storage/candidate_images/')}}";
        let image = `/${candidate.image}`;
        let assetImage = asset + image;

        modalContent.innerHTML = `
            <div class="d-flex justify-content-center mb-2">
                                    <img src="${assetImage}" alt="image" class="rounded-circle mx-auto" style="width:80px; height:80px">
                                </div>
                <p>Name : ${candidate.name} </p>
                <p>Course and Section : ${candidate.course_and_section}</p>
                <p>Description: ${candidate.description}</p>
                <p>Platform: ${candidate.platform}</p>
                `;
        $('#infoModal2').modal('show');
    }
</script>
@endsection