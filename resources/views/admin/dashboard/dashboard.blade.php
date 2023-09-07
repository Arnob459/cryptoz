@extends('admin.layouts.master')

@section('content')

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>


<div class="page-heading">
    <h3>Welcome back, Admin!</h3>

</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 ">
            <div class="row">
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Total Users </h6>
                                    <h6 class="font-extrabold mb-0">20</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon green mb-2">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Active Users</h6>
                                    <h6 class="font-extrabold mb-0">17</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fas fa-user-edit"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Pending Users</h6>
                                    <h6 class="font-extrabold mb-0">2</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon red mb-2">
                                        <i class="fas fa-user-times"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Block Users</h6>
                                    <h6 class="font-extrabold mb-0">1</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon green mb-2">
                                        <i class="far fa-envelope-open"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Email Verified</h6>
                                    <h6 class="font-extrabold mb-0">20</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon red mb-2">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Email Unverified</h6>
                                    <h6 class="font-extrabold mb-0">0</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon green mb-2">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">SMS Verified</h6>
                                    <h6 class="font-extrabold mb-0">20</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="stats-icon red mb-2">
                                        <i class="fas fa-comment-slash"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">SMS Unverified </h6>
                                    <h6 class="font-extrabold mb-0">0</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">All User Balance</h6>
                                    <h6 class="font-extrabold mb-0">$ 981.2997 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-heading">
                    <h3>Deposit Statistics</h3>
                </div>

                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon green mb-2">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Total Deposit Amount</h6>
                                    <h6 class="font-extrabold mb-0">$ 0 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="stats-icon green mb-2">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Total Deposits</h6>
                                    <h6 class="font-extrabold mb-0">0 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fas fa-spinner"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Pending Deposit Amount</h6>
                                    <h6 class="font-extrabold mb-0">$ 0 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fas fa-spinner"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Pending Deposits</h6>
                                    <h6 class="font-extrabold mb-0">0 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon red mb-2">
                                        <i class="fas fa-money-bill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Reject Deposit Amount</h6>
                                    <h6 class="font-extrabold mb-0">$ 0 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon red mb-2">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Reject Deposits </h6>
                                    <h6 class="font-extrabold mb-0">0 </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-heading">
                    <h3>Withdrawal Statistics</h3>
                </div>

                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="stats-icon green mb-2">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Total Withdrawal Amount  </h6>
                                    <h6 class="font-extrabold mb-0">$ 0 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon green mb-2">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Total Withdraws</h6>
                                    <h6 class="font-extrabold mb-0">0</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fas fa-spinner"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Pending Withdrawal Amount</h6>
                                    <h6 class="font-extrabold mb-0">$ 0 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fas fa-spinner"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Pending Withdraws</h6>
                                    <h6 class="font-extrabold mb-0">0</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon red mb-2">
                                        <i class="fas fa-money-bill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Reject Withdraws Amount</h6>
                                    <h6 class="font-extrabold mb-0">$ 0 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon red mb-2">
                                        <i class="fas fa-ban"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Reject Withdraws</h6>
                                    <h6 class="font-extrabold mb-0">0</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-heading">
                    <h3>Investment Statistics</h3>
                </div>

                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="fas fa-money-check-alt"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Total Invest</h6>
                                    <h6 class="font-extrabold mb-0">$ 4545 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Today Invest</h6>
                                    <h6 class="font-extrabold mb-0">$ 0 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Yesterday Invest</h6>
                                    <h6 class="font-extrabold mb-0">$ 0 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4  ">
                                    <div class="stats-icon green mb-2">
                                        <i class="fas fa-money-bill-alt"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Last 7 days Invest</h6>
                                    <h6 class="font-extrabold mb-0">$ 0 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="stats-icon red mb-2">
                                       <i class="fas fa-money-bill-wave-alt"></i>

                                    </div>
                                </div>
                                <div class="col-md-8 ">
                                    <h6 class="text-muted font-semibold">Last 30 days Invest</h6>
                                    <h6 class="font-extrabold mb-0">$ 0 USD</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
</div>

@endsection

