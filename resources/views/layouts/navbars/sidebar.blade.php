<div class="sidebar">
    <div class="sidebar-wrapper">
        <br>    
        <a href="#" class="text-center ms-1 font-weight-bold"> <h3>{{ auth()->user()->role }}</h3></a>
            <hr class="horizontal dark mt-0">
        <ul class="nav">
            <li @if ($pageSlug == '') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            @if (auth()->user()->role == 'CUSTOMER')
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-bank"></i>
                    <span class="nav-link-text  " >{{ __('Customer') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'purchase-order') class="active " @endif>
                            <a href="{{ route('purchase-order.index')  }}">
                                <i class="tim-icons icon-bag-16"></i>
                                <p>{{ _('Purchase Order') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            @if (auth()->user()->role == 'ADMIN')
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-single-02"></i>
                    <span class="nav-link-text" >{{ __('Master Admin') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'purchase-order') class="active " @endif>
                            <a href="{{ route('purchase-order.index')  }}">
                                <i class="tim-icons icon-bag-16"></i>
                                <p>{{ _('Purchase Order') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'invoice') class="active " @endif>
                            <a href="{{ route('invoice.index')  }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ _('Invoice') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'surat-jalan') class="active " @endif>
                            <a href="{{ route('surat-jalan.index')  }}">
                                <i class="tim-icons icon-delivery-fast"></i>
                                <p>{{ _('Surat Jalan') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'pengeluaran-bbm') class="active " @endif>
                            <a href="{{ route('pengeluaran-bbm.index')  }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ _('Pengeluaran BBM') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'biaya-operasional') class="active " @endif>
                            <a href="{{ route('biaya-operasional.index')  }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ _('Biaya Operasional') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

            @if (auth()->user()->role == 'DIREKTUR')
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="tim-icons icon-single-02"></i>
                    <span class="nav-link-text" >{{ __('Master Direktur') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'users') class="active " @endif>
                        <a href="{{ route('biaya-operasional.index')  }}">
                                <i class="tim-icons icon-wallet-43"></i>
                                <p>{{ _('Biaya Operasional') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

            @if (auth()->user()->role == 'ADMIN')
            <li>
                <a data-toggle="collapse" href="#laporan" aria-expanded="true">
                    <i class="tim-icons icon-single-copy-04"></i>"  
                    <span class="nav-link-text" >{{ __('Laporan') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laporan">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'laporan-po') class="active " @endif>
                            <a href="{{ route('purchase-order.laporan')  }}">
                                <i class="tim-icons icon-bag-16"></i>
                                <p>{{ _('Purchase Order') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'laporan-invoice') class="active " @endif>
                            <a href="{{ route('invoice.laporan')  }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ _('Invoice') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'laporan-suratjalan') class="active " @endif>
                            <a href="{{ route('surat-jalan.laporan')  }}">
                                <i class="tim-icons icon-delivery-fast"></i>
                                <p>{{ _('Surat Jalan') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

             @if (auth()->user()->role == 'DIREKTUR')
                <li>
                    <a data-toggle="collapse" href="#laporan" aria-expanded="true">
                    <i class="tim-icons icon-single-copy-04"></i>
                    <span class="nav-link-text" >{{ __('Laporan') }}</span>
                    <b class="caret mt-1"></b>
                     </a>
                <div class="collapse show" id="laporan">
                    <ul class="nav pl-4">
                    <li @if ($pageSlug == 'laporan-po') class="active " @endif>
                            <a href="{{ route('purchase-order.laporan')  }}">
                                <i class="tim-icons icon-bag-16"></i>
                                <p>{{ _('Purchase Order') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'laporan-invoice') class="active " @endif>
                            <a href="{{ route('invoice.laporan')  }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ _('Invoice') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == '') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-bank"></i>
                                <p>{{ _('Rekap Biaya Operasional') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == '') class="active " @endif>
                            <a href="">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ _('Pendapatan') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             @endif
        
            @if (auth()->user()->role == 'DIREKTUR')
            <li>
                <a data-toggle="collapse" href="#user" aria-expanded="true">
                    <i class="tim-icons icon-badge"></i>
                    <span class="nav-link-text" >{{ __('User') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="user">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'user') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

            @if (auth()->user()->role == 'KEUANGAN')
            <li>
                <a data-toggle="collapse" href="#keuangan" aria-expanded="true">
                    <i class="tim-icons icon-badge"></i>
                    <span class="nav-link-text" >{{ __('Master Keuangan') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="user">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'pengeluaran-bbm') class="active " @endif>
                            <a href="{{ route('pengeluaran-bbm.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Pengeluaran BBM') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
        </ul>
    </div>
</div>
