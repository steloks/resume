<div class="row mb-2r">
    <div class="col-12 col-md-6 ta-dleft-mc mt-2r">
        <div>
            <a href="{{ route('profile.orders') }}" class="df-blink text-uppercase mb-0d5">Back to MY orders</a>
        </div>
        <div><h2 class="ff-fptdemi">{{ __('Order №') . ' ' .  $order->id }}</h2></div>
    </div>
    <div class="col-12 col-md-6 ta-dright-mc mt-2r">
        <button type="button" id="" class="btn btn-df-b btn-sq-lp mb-1r mr-d1r-12x0r" data-bs-toggle="modal"
                data-bs-target="#dfCancelOrderModal">Cancel order
        </button>
        <button type="button" id="" class="btn btn-df-wine-r btn-sq-lp bg-transp mb-1r" data-bs-toggle="modal"
                data-bs-target="#dfCancelMenu">Cancel menu
        </button>
    </div>
</div>
<div class="row mb-2r">
    <div class="col-12">
        <div class="row m-0 py-2r px-2r wbr-0d7r">
            <div class="col-12 mb-2r">
        <span>
          <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M25.1016 7.80469H1.89844C1.43437 7.80469 1.05469 7.425 1.05469 6.96094C1.05469 6.49687 1.43437 6.11719 1.89844 6.11719H25.1016C25.5656 6.11719 25.9453 6.49687 25.9453 6.96094C25.9453 7.425 25.5656 7.80469 25.1016 7.80469Z"
                fill="#C59F7B"/>
            <path
                d="M13.2891 14.5547H1.89844C1.43437 14.5547 1.05469 14.175 1.05469 13.7109C1.05469 13.2469 1.43437 12.8672 1.89844 12.8672H13.2891C13.7531 12.8672 14.1328 13.2469 14.1328 13.7109C14.1328 14.175 13.7531 14.5547 13.2891 14.5547Z"
                fill="#C59F7B"/>
            <path
                d="M13.2891 21.3047H1.89844C1.43437 21.3047 1.05469 20.925 1.05469 20.4609C1.05469 19.9969 1.43437 19.6172 1.89844 19.6172H13.2891C13.7531 19.6172 14.1328 19.9969 14.1328 20.4609C14.1328 20.925 13.7531 21.3047 13.2891 21.3047Z"
                fill="#C59F7B"/>
          </svg>
        </span>
                <span class="fz-20xr ff-fptdemi pl-0d4r">Details</span>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 text-left dd-b-md-n">
                        <div class="row">
                            <div class="col-12 col-md-2 ff-fptmedium text-uppercase">
                                Order №
                            </div>
                            <div class="col-12 col-md-3 ff-fptmedium text-uppercase">
                                Date
                            </div>
                            <div class="col-12 col-md-4 ff-fptmedium text-uppercase">
                                Delivery address
                            </div>
                            <div class="col-12 col-md-3 ff-fptmedium text-uppercase ta-dc-ml">
                                Invoice
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12 text-left">
                        <div class="row">
                            <div class="col-12 col-md-2 mb-0d5r">
                                <div>{{ $order->id }}</div>
                            </div>
                            <div class="col-12 col-md-3 mb-0d5r">
                                <div>{{ parseDate($order->created_at) }}</div>
                            </div>
                            <div class="col-12 col-md-4 mb-0d5r">
                                <div>{{ $order->user_address }}</div>
                            </div>
                            <div class="col-12 col-md-3 ta-dc-ml mb-0d5r">
                                <div class="text-uppercase">
                                  @if(!empty($order->invoice->id))
                                        <form method="POST" action="{{ route('profile.invoice', ['invoiceId' => $order->invoice->id]) }}">
                                            @csrf
                                            <button type="submit" style="border: 0;border-radius: 1rem"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.875 18.8438V15.7188C21.875 15.5115 21.7927 15.3128 21.6462 15.1663C21.4997 15.0198 21.301 14.9375 21.0938 14.9375C20.8865 14.9375 20.6878 15.0198 20.5413 15.1663C20.3948 15.3128 20.3125 15.5115 20.3125 15.7188V18.8438C20.3125 19.051 20.2302 19.2497 20.0837 19.3962C19.9372 19.5427 19.7385 19.625 19.5312 19.625H5.46875C5.26155 19.625 5.06284 19.5427 4.91632 19.3962C4.76981 19.2497 4.6875 19.051 4.6875 18.8438V15.7188C4.6875 15.5115 4.60519 15.3128 4.45868 15.1663C4.31216 15.0198 4.11345 14.9375 3.90625 14.9375C3.69905 14.9375 3.50034 15.0198 3.35382 15.1663C3.20731 15.3128 3.125 15.5115 3.125 15.7188V18.8438C3.125 19.4654 3.37193 20.0615 3.81147 20.501C4.25101 20.9406 4.84715 21.1875 5.46875 21.1875H19.5312C20.1529 21.1875 20.749 20.9406 21.1885 20.501C21.6281 20.0615 21.875 19.4654 21.875 18.8438ZM16.8906 14.7656L12.9844 17.8906C12.8464 17.9996 12.6758 18.0589 12.5 18.0589C12.3242 18.0589 12.1536 17.9996 12.0156 17.8906L8.10938 14.7656C7.96704 14.6313 7.88033 14.4484 7.86638 14.2532C7.85243 14.0579 7.91228 13.8646 8.03406 13.7114C8.15585 13.5582 8.33072 13.4562 8.52406 13.4258C8.71739 13.3953 8.91513 13.4385 9.07812 13.5469L11.7188 15.6562V4.78125C11.7188 4.57405 11.8011 4.37534 11.9476 4.22882C12.0941 4.08231 12.2928 4 12.5 4C12.7072 4 12.9059 4.08231 13.0524 4.22882C13.1989 4.37534 13.2812 4.57405 13.2812 4.78125V15.6562L15.9219 13.5469C16.0005 13.4726 16.0938 13.4155 16.1957 13.3792C16.2976 13.3428 16.4059 13.328 16.5138 13.3357C16.6217 13.3434 16.7268 13.3735 16.8225 13.4239C16.9182 13.4744 17.0024 13.5442 17.0697 13.6289C17.137 13.7136 17.186 13.8113 17.2136 13.9159C17.2412 14.0205 17.2467 14.1297 17.2299 14.2366C17.213 14.3435 17.1742 14.4457 17.1158 14.5367C17.0574 14.6278 16.9807 14.7057 16.8906 14.7656Z" fill="#333333"></path>
                                                </svg><span class="va-center text-capitalize"> {!! '&nbsp;' . __('Invoice') !!}</span>
                                            </button>
                                        </form>
                                      @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-1r">
    <div class="col-12">
        <div class="row m-0 py-2r px-2r wbr-0d7r">
            <div class="col-12 mb-2r">
        <span>
          <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_1367_12755)">
              <path
                  d="M9.47884 27.7083H6.56217C6.15967 27.7083 5.83301 27.3817 5.83301 26.9792C5.83301 26.5767 6.15967 26.25 6.56217 26.25H9.47884C9.88134 26.25 10.208 26.5767 10.208 26.9792C10.208 27.3817 9.88134 27.7083 9.47884 27.7083Z"
                  fill="#C59F7B"/>
              <path
                  d="M33.1774 27.708H31.3545C30.952 27.708 30.6253 27.3813 30.6253 26.9788C30.6253 26.5763 30.952 26.2497 31.3545 26.2497H32.5722L33.5551 21.0113C33.542 18.3309 31.2524 16.0413 28.4378 16.0413H23.6501L21.3299 26.2497H25.5211C25.9236 26.2497 26.2503 26.5763 26.2503 26.9788C26.2503 27.3813 25.9236 27.708 25.5211 27.708H20.417C20.1953 27.708 19.9853 27.6074 19.8468 27.4338C19.7082 27.2618 19.6557 27.0343 19.7053 26.8184L22.3566 15.1518C22.4324 14.8178 22.727 14.583 23.0682 14.583H28.4378C32.0559 14.583 35.0003 17.5274 35.0003 21.1455L33.8934 27.113C33.8293 27.4586 33.5289 27.708 33.1774 27.708Z"
                  fill="#C59F7B"/>
              <path
                  d="M28.4378 30.6247C26.4282 30.6247 24.792 28.9899 24.792 26.9788C24.792 24.9678 26.4282 23.333 28.4378 23.333C30.4474 23.333 32.0837 24.9678 32.0837 26.9788C32.0837 28.9899 30.4474 30.6247 28.4378 30.6247ZM28.4378 24.7913C27.2318 24.7913 26.2503 25.7728 26.2503 26.9788C26.2503 28.1849 27.2318 29.1663 28.4378 29.1663C29.6439 29.1663 30.6253 28.1849 30.6253 26.9788C30.6253 25.7728 29.6439 24.7913 28.4378 24.7913Z"
                  fill="#C59F7B"/>
              <path
                  d="M12.3958 30.6247C10.3863 30.6247 8.75 28.9899 8.75 26.9788C8.75 24.9678 10.3863 23.333 12.3958 23.333C14.4054 23.333 16.0417 24.9678 16.0417 26.9788C16.0417 28.9899 14.4054 30.6247 12.3958 30.6247ZM12.3958 24.7913C11.1898 24.7913 10.2083 25.7728 10.2083 26.9788C10.2083 28.1849 11.1898 29.1663 12.3958 29.1663C13.6019 29.1663 14.5833 28.1849 14.5833 26.9788C14.5833 25.7728 13.6019 24.7913 12.3958 24.7913Z"
                  fill="#C59F7B"/>
              <path
                  d="M9.47949 14.5833H3.64616C3.24366 14.5833 2.91699 14.2567 2.91699 13.8542C2.91699 13.4517 3.24366 13.125 3.64616 13.125H9.47949C9.88199 13.125 10.2087 13.4517 10.2087 13.8542C10.2087 14.2567 9.88199 14.5833 9.47949 14.5833Z"
                  fill="#C59F7B"/>
              <path
                  d="M9.47884 18.9583H2.18717C1.78467 18.9583 1.45801 18.6317 1.45801 18.2292C1.45801 17.8267 1.78467 17.5 2.18717 17.5H9.47884C9.88134 17.5 10.208 17.8267 10.208 18.2292C10.208 18.6317 9.88134 18.9583 9.47884 18.9583Z"
                  fill="#C59F7B"/>
              <path
                  d="M9.47917 23.3333H0.729167C0.326667 23.3333 0 23.0067 0 22.6042C0 22.2017 0.326667 21.875 0.729167 21.875H9.47917C9.88167 21.875 10.2083 22.2017 10.2083 22.6042C10.2083 23.0067 9.88167 23.3333 9.47917 23.3333Z"
                  fill="#C59F7B"/>
              <path
                  d="M20.4163 27.708H15.3122C14.9097 27.708 14.583 27.3813 14.583 26.9788C14.583 26.5763 14.9097 26.2497 15.3122 26.2497H19.8345L23.1478 11.6663H6.56217C6.15967 11.6663 5.83301 11.3397 5.83301 10.9372C5.83301 10.5347 6.15967 10.208 6.56217 10.208H24.0622C24.2838 10.208 24.4938 10.3086 24.6324 10.4822C24.7709 10.6543 24.8234 10.8818 24.7738 11.0976L21.128 27.1393C21.0522 27.4732 20.7561 27.708 20.4163 27.708Z"
                  fill="#C59F7B"/>
            </g>
            <defs>
              <clipPath id="clip0_1367_12755">
                <rect width="35" height="35" fill="white"/>
              </clipPath>
            </defs>
          </svg>
        </span>
                <span class="fz-20xr ff-fptdemi pl-0d4r">Track your order</span>
            </div>
            @foreach($order->recipes->where('status_id', '<>', 10) as $orderRecipe)
                <div>
                    {{ 'Menu №' . $order->id . '-0' . $orderRecipe->id . ' - ' . parseNumber($orderRecipe->grams) . 'gr.' }}
                </div>
                @if($orderRecipe->status->name !== 'Cancelled')
                    <div class="col-12 mb-1r dd-b-md-n">
                        <img
                            src="{{ asset('images/order/track-your-order-step'.($orderRecipesHistory->where('type', '<>',  'payment')->where('order_recipe_id', $orderRecipe->id)->count() > 5 ? 5 : $orderRecipesHistory->where('type', '<>',  'payment')->where('order_recipe_id', $orderRecipe->id)->count()).'.svg') }}"
                            class="img-fluid d-block m-auto w-90p" alt="Order track">
                    </div>
                    <div class="col-12">
                        <div class="row">
                            @foreach($statuses as $status)
                                @if(!($status->name == 'Cancelled'))
                                    <span class="w-20-c-dib mb-1r">
                                <span class="fw-600 d-block mb-0d5r">{{ $status->name }}</span>
                                    @if(!empty($orderRecipesHistory->where('order_recipe_id', $orderRecipe->id)->firstWhere('status_id', $status->id)))
                                            {{ $orderRecipesHistory->where('order_recipe_id', $orderRecipe->id)->firstWhere('status_id', $status->id)->created_at }}
                                        @endif
                              </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="row mb-2r">
    <div class="col-12">
        <div class="row m-0 py-2r px-2r wbr-0d7r">
            <div class="col-12 col-xl-8 mb-1r">
                <div class="row">
                    <div class="col-12 mb-2r">
            <span>
              <svg width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20.8058 6.62364L20.7881 6.59294C20.7635 6.54189 20.7351 6.493 20.7034 6.44654L17.3645 0.674064C17.124 0.258282 16.6762 0 16.1959 0H4.70509C4.22401 0 3.77588 0.258891 3.53546 0.675798L0.142172 6.56265C0.11161 6.61572 0.0895783 6.67122 0.0740157 6.72761C0.02625 6.85656 0 6.99592 0 7.14133V22.346C0 23.258 0.741986 24 1.65399 24H19.2464C20.1584 24 20.9004 23.258 20.9004 22.346V7.08559C20.9004 7.0652 20.8998 7.04495 20.8987 7.0248C20.9083 6.88947 20.8789 6.74992 20.8058 6.62364ZM11.1777 1.40677H16.1632L18.7897 5.9477H11.1777V1.40677ZM4.73786 1.40677H9.77088V5.9477H2.12035L4.73786 1.40677ZM19.4936 22.346C19.4936 22.4823 19.3827 22.5932 19.2464 22.5932H1.65399C1.51768 22.5932 1.40677 22.4823 1.40677 22.346V7.35447H19.4936V22.346Z"
                    fill="#C59F7B"></path>
              </svg>
            </span>
                        <span class="fz-20xr ff-fptdemi pl-0d4r">Order summary</span>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-left dd-b-md-n">
                                <div class="row">
                                    <div class="col-12 col-md-2 ff-fptmedium text-uppercase">
                                        Product
                                    </div>
                                    <div class="col-12 col-md-2 ff-fptmedium text-uppercase">
                                        Grams
                                    </div>
                                    <div class="col-12 col-md-2 ff-fptmedium text-uppercase">
                                        Date of delivery
                                    </div>
                                    <div class="col-12 col-md-2 ff-fptmedium text-uppercase">
                                        Pet
                                    </div>
                                    <div class="col-12 col-md-2 ff-fptmedium text-uppercase">
                                        Price
                                    </div>
                                    <div class="col-12 col-md-2 ff-fptmedium text-uppercase ta-dc-ml">
                                        status
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            @foreach($order->recipes as $orderRecipe)
                                <div class="col-12 text-left">
                                    <div class="row">
                                        <div class="col-12 col-md-2 mb-0d5r">
                                            <div class="mb-0d5r"><strong>{{ $orderRecipe->recipe_name }}</strong></div>
                                            <div>Time
                                                slot: {{ $orderRecipe->timeslot->start_at  . ' - ' . $orderRecipe->timeslot->end_at }}</div>
                                        </div>
                                        <div class="col-12 col-md-2 mb-0d5r">
                                            <div>{{ parseNumber($orderRecipe->grams) }}</div>
                                        </div>
                                        <div class="col-12 col-md-2 mb-0d5r">
                                            <div>{{ parseDate($orderRecipe->date) }}</div>
                                        </div>
                                        <div class="col-12 col-md-2 mb-0d5r">
                                            <div>{{ $orderRecipe->pet->name }}</div>
                                        </div>
                                        <div class="col-12 col-md-2 mb-0d5r">
                                            <div>{!! parsePrice($orderRecipe->price) !!}</div>
                                        </div>
                                        <div class="col-12 col-md-1 ta-dc-ml mb-0d5r">
                                            <div
                                                class="text-uppercase lbl-os-{{ lcfirst($orderRecipe->status->name) }}">{{ $orderRecipe->status->name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4 bg-lbr py-2r mb-1r px-1r">
                <div class="row mb-1r">
                    <div class="col-6">
                        <h3 class="fw-600">Cost:</h3>
                    </div>
                    <div class="col-6 txt-right">
                        {!! parsePrice($order->recipes->sum('price')) !!}
                    </div>
                </div>
                <div class="row mb-1r">
                    <div class="col-6">
                        <h3 class="fw-600">Delivery:</h3>
                    </div>
                    <div class="col-6 txt-right">
                        {!! parsePrice($order->delivery_price) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3 class="fw-600">VAT:</h3>
                    </div>
                    <div class="col-6 txt-right">
                        {!! parsePrice($order->vat) !!}
                    </div>
                </div>
                <div class="row mb-1r">
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row mb-2r">
                    <div class="col-6">
                        <h3 class="fw-600">Total cost:</h3>
                    </div>
                    <div class="col-6 txt-right">
                        {!! parsePrice($order->total_amount) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="row m-0 py-2r px-2r wbr-0d7r">
            <div class="col-12 mb-2r">
        <span>
          <svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M6.25 22.4375C6.13516 22.4375 6.01953 22.4117 5.91094 22.3602C5.64141 22.2297 5.46875 21.957 5.46875 21.6562V17.75H3.125C1.83281 17.75 0.78125 16.6984 0.78125 15.4062V2.90625C0.78125 1.61406 1.83281 0.5625 3.125 0.5625H21.875C23.1672 0.5625 24.2188 1.61406 24.2188 2.90625V15.4062C24.2188 16.6984 23.1672 17.75 21.875 17.75H12.3836L6.73828 22.2664C6.59688 22.3797 6.42422 22.4375 6.25 22.4375ZM3.125 2.125C2.69375 2.125 2.34375 2.47578 2.34375 2.90625V15.4062C2.34375 15.8367 2.69375 16.1875 3.125 16.1875H6.25C6.68203 16.1875 7.03125 16.5367 7.03125 16.9688V20.0312L11.6211 16.3586C11.7602 16.2477 11.9312 16.1875 12.1094 16.1875H21.875C22.3062 16.1875 22.6562 15.8367 22.6562 15.4062V2.90625C22.6562 2.47578 22.3062 2.125 21.875 2.125H3.125Z"
                fill="#C59F7B"/>
            <path
                d="M18.75 8.375H6.25C5.81797 8.375 5.46875 8.025 5.46875 7.59375C5.46875 7.1625 5.81797 6.8125 6.25 6.8125H18.75C19.182 6.8125 19.5312 7.1625 19.5312 7.59375C19.5312 8.025 19.182 8.375 18.75 8.375Z"
                fill="#C59F7B"/>
            <path
                d="M12.5 11.5H6.25C5.81797 11.5 5.46875 11.15 5.46875 10.7188C5.46875 10.2875 5.81797 9.9375 6.25 9.9375H12.5C12.932 9.9375 13.2812 10.2875 13.2812 10.7188C13.2812 11.15 12.932 11.5 12.5 11.5Z"
                fill="#C59F7B"/>
          </svg>
        </span>
                <span class="fz-20xr ff-fptdemi pl-0d4r">Comment</span>
            </div>
            <div class="col-12">
                {!! $order->comment !!}
            </div>
        </div>
    </div>
</div>

@include('panels.modals.cancel-menu-modal')
@include('panels.modals.order-successfully-updated-modal')
@include('panels.modals.cancel-order-modal')

