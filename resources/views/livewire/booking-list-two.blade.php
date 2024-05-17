<div>
    <div class="row">
        <div class="col-3 mb-5">
            <div class="mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                <h2 class="card-title mb-0">Filter</h2>
                <button wire:click="clearFilters" class="btn btn-sm btn-primary">Clear Filter</button>
            </div>
            <div class="row gx-3">
                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="mb-4">
                        <div class="d-flex flex-wrap mb-2">
                            <h5 class="mb-0 text-body-highlight me-2">Port of Discharge</h5>
                        </div>
                        <select class="form-select mb-3" aria-label="category" wire:model="pod" wire:ignore.self>
                            <option value="" selected >Select Port of Discharge</option>
                            <option value="CHARLESTON, US">Charleston, US</option>
                            <option value="HOUSTON, US">Houston, US</option>
                            <option value="JACKSONVILLE, US">Jacksonville, US</option>
                            <option value="LONG BEACH, US">Long Beach, US</option>
                            <option value="MIAMI, US">Miami, US</option>
                            <option value="MOBILE, US">Mobile, US</option>
                            <option value="NEW ORLEANS, US">New Orleans, US</option>
                            <option value="NEW YORK, US">New York, US</option>
                            <option value="OAKLAND, US">Oakland, US</option>
                            <option value="PORTLAND, OR, US">Portland, OR, US</option>
                            <option value="SAVANNAH, US">Savannah, US</option>
                            <option value="SEATTLE, US">Seattle, US</option>
                            <option value="TAMPA, US">Tampa, US</option>
                            <option value="VANCOUVER, CA">Vancouver, CA</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="mb-4">
                        <div class="d-flex flex-wrap mb-2">
                            <h5 class="mb-0 text-body-highlight me-2">STO #</h5>
                        </div><input class="form-control mb-xl-3" type="text" placeholder="STO Number"
                            wire:model="sto">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="mb-4">
                        <div class="d-flex flex-wrap mb-2">
                            <h5 class="mb-0 text-body-highlight me-2">PO #</h5>
                        </div><input class="form-control mb-xl-3" type="text" placeholder="PO Number"
                            wire:model="po">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="mb-4">
                        <div class="d-flex flex-wrap mb-2">
                            <h5 class="mb-0 text-body-highlight me-2">Booking #</h5>
                        </div><input class="form-control mb-xl-3" type="text" placeholder="Booking Number"
                            wire:model="booking">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="mb-4">
                        <div class="d-flex flex-wrap mb-2">
                            <h5 class="mb-0 text-body-highlight me-2">Container #</h5>
                        </div><input class="form-control mb-xl-3" type="text" placeholder="Container Number"
                            wire:model="container">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center" id="scrollspyDeals">
                        <h3 class="mb-3">Incoming Shipment within Two Weeks</h3>
                    </div>
                    <div class="border-top border-bottom border-translucent" id="leadDetailsTable"
                        data-list="{&quot;valueNames&quot;:[&quot;date&quot;,&quot;booking&quot;,&quot;container&quot;,&quot;pod&quot;,&quot;carrier&quot;,&quot;ponum&quot;,&quot;stonum&quot;,&quot;dateduration&quot;],&quot;page&quot;:7,&quot;pagination&quot;:true}">
                        <div class="table-responsive scrollbar mx-n1 px-1">
                            <table class="table fs-9 mb-0" wire:ignore.self>
                                <thead>
                                    <tr class="text-center">
                                        <th class="sort white-space-nowrap align-middle pe-3 ps-0 text-uppercase"
                                            scope="col" data-sort="date" style="min-width:100px">ETA
                                        </th>
                                        <th class="sort align-middle pe-6 text-uppercase" scope="col"
                                            data-sort="booking" style="min-width:120px">Booking</th>
                                        <th class="sort align-middle  text-uppercase" scope="col"
                                            data-sort="container" style=" min-width:180px">Container</th>
                                        <th class="sort align-middle t text-uppercase" scope="col" data-sort="pod"
                                            style="min-width:130px">POD</th>
                                        <th class="sort align-middle ps-0  text-uppercase" scope="col"
                                            data-sort="carrier" style="min-width:120px">Carrier</th>
                                        <th class="sort align-middle text-uppercase" scope="col" data-sort="ponum"
                                            style="min-width:140px">PO No.</th>
                                        <th class="sort align-middle  text-uppercase" scope="col" data-sort="stonum"
                                            style="min-width:140px">STO No.</th>
                                        <th class="sort align-middle  text-uppercase" scope="col"
                                            data-sort="dateduration" style="min-width:220px">Lead Time from Order Receipt</th>
                                        <th class="align-middle pe-0 " scope="col" style="width:15%;"> </th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="lead-details-table-body">
                                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                        @foreach ($bookings as $booking)
                                        @php
                                        // Get the status_date
                                        $dateBookedString = optional($booking->bookingoldest)->status_date;
                                        $dateDifference = null;
                                        if (!empty($dateBookedString)) {
                                            try {
                                                // Parse the date with the given format
                                                $dateBooked = \Carbon\Carbon::createFromFormat('d/m/Y', $dateBookedString);
                                                $today = \Carbon\Carbon::now('Asia/Manila');
                                                // Calculate the difference in days
                                                $dateDifference = $dateBooked->diffInDays($today);
                                            } catch (\Exception $e) {
                                                // Log the error if needed
                                                \Log::error('Failed to parse date: ' . $e->getMessage());
                                            }
                                        }
                                    @endphp
                                    <tr class="text-center">
                                        <td class="align-middle date ps-0">{{ $booking->eta }}</td>
                                        <td class="align-middle booking ps-0">{{ $booking->booking->booking_number }}
                                        </td>
                                        <td class="align-middle container ps-0">
                                            {{ $booking->booking->container_number }}
                                        </td>
                                        <td class="align-middle pdonum ps-0">{{ $booking->pod }}</td>
                                        <td class="align-middle carrier ps-0">{{ $booking->booking->carrier }}</td>
                                        <td class="align-middle ponum ps-0">{{ $booking->booking->customer_po }}</td>
                                        <td class="align-middle stonum ps-0">{{ $booking->booking->sto_number }}</td>
                                        <td class="align-middle dateduration"> {{ $dateDifference }} Days</td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
                            <div class="col-auto d-flex" wire:ignore>
                                <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body"
                                    data-list-info="data-list-info">1
                                    to 5 <span class="text-body-tertiary"> Items of </span>6</p><a class="fw-semibold"
                                    href="#!" data-list-view="*" id="viewalltable">View all <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a
                                    class="fw-semibold d-none" href="#!" data-list-view="less" id="viewalltableless">View Less<svg
                                        class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1"
                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                        data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 256 512" data-fa-i2svg=""
                                        style="transform-origin: 0.25em 0.5625em;">
                                        <g transform="translate(128 256)">
                                            <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"
                                                    transform="translate(-128 -256)"></path>
                                            </g>
                                        </g>
                                    </svg><!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a>
                            </div>
                            <div class="col-auto d-flex"><button class="page-link disabled"
                                    data-list-pagination="prev" disabled=""><svg
                                        class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="chevron-left" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z">
                                        </path>
                                    </svg><!-- <span class="fas fa-chevron-left"></span> Font Awesome fontawesome.com --></button>
                                <ul class="mb-0 pagination">
                                    <li class="active"><button class="page" type="button" data-i="1"
                                            data-page="5">1</button></li>
                                    <li><button class="page" type="button" data-i="2"
                                            data-page="5">2</button>
                                    </li>
                                </ul><button class="page-link pe-0" data-list-pagination="next"><svg
                                        class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="chevron-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z">
                                        </path>
                                    </svg><!-- <span class="fas fa-chevron-right"></span> Font Awesome fontawesome.com --></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get reference to the clear filter button
        function clickall(){
            var viewAllLink = document.getElementById("viewalltable");
            var viewAllLink2 = document.getElementById("viewalltableless");

            viewAllLink.click();
            viewAllLink2.click();

            console.log('clicked');
        }
        Livewire.on('closeviewall', () => {
            clickall();
          });
        const inputs = document.querySelectorAll('.form-control');

        // Add event listener to each input field
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                // Check if all input fields are empty
                const allEmpty = [...inputs].every(input => input.value.trim() === null);
                if (allEmpty) {
                    console.log('All input fields are empty');
                    Livewire.emit('clearFilters');
                }
            });
        });
    });
</script>
