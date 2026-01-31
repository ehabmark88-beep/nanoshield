<style>
    button.px-4.py-2.text-white.rounded-full {
    background-color: #e47823 !important;
}
</style><div class="flex-1">
        <div>
            @include('layouts.pages.flash-massage')
        </div><br>
        <table class="w-full text-sm lg:text-base" cellspacing="0">
            <thead>
            <tr class="h-12 uppercase">
                <th class="hidden md:table-cell"></th>
                <th class="text-left">{{ __('messages.products') }}</th>
                <th class="lg:text-right text-left pl-5 lg:pl-0">
                    <span class="lg:hidden" title="Quantity">{{ __('messages.quantity') }}</span>
                    <span class="hidden lg:inline">{{ __('messages.quantity') }}</span>
                </th>
                <th class="hidden text-right md:table-cell">{{ __('messages.price') }}</th>
                <th class="text-right">{{ __('messages.total_product_price') }}</th>
                <th class="text-right">{{ __('messages.delete_product') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $carts as $cart)
                <tr>
                    <td class="hidden pb-4 md:table-cell">
                        <a href="#">
                            <img src="{{ asset('img/products/' . $cart->product->image) }}" class="" alt="" width="100" height="100" style="margin-top: 0px">
                        </a>
                    </td>
                    <td>
                        <h1 style="color: black" class="mb-2 md:ml-4">
                            {{ App::isLocale('ar') ? $cart->product->name_ar : $cart->product->name }}
                        </h1>
                    </td>
                    <td class="justify-center md:justify-end md:flex mt-6">
                        <div class="w-20 h-10">
                            <div class="relative flex items-center w-full h-12 border border-gray-300 rounded-lg shadow-md bg-white">
                                <button class="flex items-center justify-center w-10 h-full text-white bg-red-500 rounded-l-lg hover:bg-red-600 transition duration-200" wire:click="decrement({{ $cart->id }})">
                                    <span class="text-lg font-bold">-</span>
                                </button>
                                <input type="text" value="{{ $cart->quantity }}" class="flex-grow h-full text-center text-lg border-none focus:outline-none focus:ring-2 focus:ring-orange-400" min="1"/>
                                <button class="flex items-center justify-center w-10 h-full text-white bg-green-500 rounded-r-lg hover:bg-green-600 transition duration-200" wire:click="increment({{ $cart->id }})">
                                    <span class="text-lg font-bold">+</span>
                                </button>
                            </div>

                        </div>
                    </td>
                    <td class="hidden text-right md:table-cell">
                        <span style="font-weight: bolder"  class="text-sm lg:text-base font-medium">{{$cart->product->price}} {{ __('messages.currency') }}</span>
                    </td>
                    <td class="text-right">
                        <span style="font-weight: bolder" class="text-sm lg:text-base font-medium">{{ $cart->product->price * $cart->quantity }} {{ __('messages.currency') }}</span>
                    </td>
                    <td class="text-right">
                        <button wire:click="remove({{ $cart->id }})" type="submit" class="text-gray-700 md:ml-4">
                            <h2 style="font-size: xx-large;color: #e47823"">X</h2>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <hr class="pb-6 mt-6">
        <div class="my-4 mt-6 -mx-2 lg:flex">
            <!-- Coupon Section -->
            <div class="lg:px-2 lg:w-1/2">
                <div class="p-4 bg-gray-100 rounded-full">
                    <h1 class="ml-2 font-bold uppercase" style="color: #e47823">
                        {{ __('messages.discount_coupon') }}
                    </h1>
                </div>
                <div class="p-4">
                    <div class="justify-center md:flex">
                        <div class="flex items-center w-full h-13 pl-3 bg-white bg-gray-100 border rounded-full">
                            <input type="coupon" name="code" id="coupon" placeholder="{{ __('messages.discount_coupon') }}"
                                   class="w-full bg-gray-100 outline-none appearance-none focus:outline-none active:outline-none"
                                   wire:model="couponCode" />
                            <button wire:click="applyCoupon" style="background-color: #e47823 !important;" type="submit"
                                    class="text-sm flex items-center px-3 py-1 text-white bg-gray-800 rounded-full outline-none md:px-4 hover:bg-gray-700 focus:outline-none active:outline-none">
                                <svg aria-hidden="true" data-prefix="fas" data-icon="gift" class="w-8"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                          d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z">
                                    </path>
                                </svg>
                                <span class="font-medium">{{ __('messages.discount_code') }}</span>
                            </button>
                            @if (session()->has('success'))
                                <div>{{ session('success') }}</div>
                            @endif

                            @if (session()->has('error'))
                                <div>{{ session('error') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-4 mb-4 bg-green-50 rounded-xl border border-green-200">
    <h2 class="font-bold text-lg mb-2" style="color:#21cc76">
        🎁 نقاط الولاء
    </h2>

    <p class="mb-2">
        نقاطك المتاحة:
        <strong>{{ number_format($availablePoints) }}</strong> نقطة
    </p>

    @if($availablePoints >= 1000)
        <button wire:click="applyLoyaltyPoints"
                class="px-4 py-2 text-white rounded-full"
                style="background:#21cc76">
            استخدام نقاطي (خصم {{ ($availablePoints / 1000) * 100 }} {{ __('messages.currency') }})
        </button>

        @if($usePoints)
            <p class="mt-2 text-green-700">
                ✔ تم استخدام {{ $pointsToUse }} نقطة
            </p>
        @endif
    @else
        <p class="text-red-600">
            ❌ تحتاج على الأقل 1000 نقطة للاستخدام
        </p>
    @endif
</div>

            </div>

            <!-- Order Details Section -->
            <div class="lg:px-2 lg:w-1/2">
                <div class="p-4 bg-gray-100 rounded-full">
                    <h1 style="color: #e47823" class="ml-2 font-bold uppercase">
                        {{ __('messages.order_details') }}
                    </h1>
                </div>
                <div class="p-4">
                    <!-- Product Total -->
                    <div class="flex justify-between border-b {{ App::isLocale('en') ? 'flex-row-reverse' : '' }}">
                        <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                            {{ number_format($sub_total, 2) }} {{ __('messages.currency') }}
                        </div>
                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                            {{ __('messages.product_total') }}
                        </div>
                    </div>

                    <!-- Discount -->
                    <div class="flex justify-between border-b {{ App::isLocale('en') ? 'flex-row-reverse' : '' }}">
                        <div class="flex lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-gray-800" style="color: #21cc76;">
                            <del>
                                @if ($isPercentage)
                                    <del>{{ $discount }} %</del>
                                @else
                                    <del>{{ $discount }} {{ __('messages.currency') }}</del>
                                @endif
                            </del>
                        </div>
                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-green-700" style="color: #21cc76;">
                            {{ __('messages.discount_coupon') }}
                        </div>
                    </div>

                    <!-- Total After Discount -->
                    <div class="flex justify-between border-b {{ App::isLocale('en') ? 'flex-row-reverse' : '' }}">
                        <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                            {{ number_format($discounted_total, 2) }} {{ __('messages.currency') }}
                        </div>
                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                            {{ __('messages.total_after_discount') }}
                        </div>
                    </div>

                    <!-- Delivery -->
{{--                    <div class="flex justify-between border-b {{ App::isLocale('en') ? 'flex-row-reverse' : '' }}">--}}
{{--                        <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">--}}
{{--                            {{ number_format($tax, 2) }}--}}
{{--                        </div>--}}
{{--                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">--}}
{{--                            {{ __('messages.delivery') }}--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <form method="post" id="bookingForm" action="{{ route('order') }}">
                        @csrf
                    <!-- Final Price -->
                    <hr style="width: 100%; background-color: #e27723; height: 1px;">
                    <div class="flex justify-between border-b {{ App::isLocale('en') ? 'flex-row-reverse' : '' }}">

                        <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800" style="color: #e27723;">
                            {{ number_format($this->total, 2) }} {{ __('messages.currency') }}
                        </div>
                        <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900" style="color: #e27723;">
                            {{ __('messages.final_price') }}
                        </div>
                        <br>
                    </div>
                        <div style="display: flex; width: 100%;gap: 10px;">
                            <!-- الاسم -->
                            <div class="form-group" style="width:50%;">
{{--                                <label for="name">{{ __('messages.full_name') }}</label>--}}
                                <input style="width: 100%" type="text" id="name" name="name"
                                       placeholder="{{ __('messages.full_name') }}"
                                       value="{{ old('name', isset($userData) ? $userData['name'] : '') }}"
                                       required>
                            </div>
                            <!-- الايميل -->
                            <div class="form-group" style="width:50%;">
{{--                                <label for="email">{{ __('messages.email') }}</label>--}}
                                <input style="width: 100%" type="email" id="email" name="email"
                                       placeholder="{{ __('messages.email') }}"
                                       value="{{ old('email', isset($userData) ? $userData['email'] : '') }}"
                                       required>
                            </div>
                        </div>

                        <div style="display: flex;width: 100%;gap: 10px;">
                            <!-- رقم الجوال -->
                            <div class="form-group" style="width:50%;">
{{--                                <label for="phone">{{ __('messages.phone') }}</label>--}}
                                <input style="width: 100%" type="tel" id="phone" name="phone_number"
                                       placeholder="{{ __('messages.phone') }}"
                                       value="{{ old('phone_number', isset($userData) ? $userData['phone_number'] : '') }}"
                                       required>
                            </div>

                            <div class="form-group" style="width:50%;">
{{--                                <label for="phone">{{ __('messages.address') }}</label>--}}
                                <input style="width: 100%" type="tel" id="phone" name="address"
                                       placeholder="{{ __('messages.address') }}"
                                       value="{{ old('address', isset($userData) ? $userData['address'] : '') }}"
                                       required>
                            </div>
                        </div>

                    @foreach( $carts as $cart)
                        <input hidden  name="cart_id[]" value="{{ $cart->id }}" id="cart_id[]" required>
                    @endforeach
                        <input hidden name="coupon_id" id="coupon_id" wire:model="couponId">
                        <input hidden name="final_price" value="{{ number_format($this->total, 2, '.', '') }}" id="price" required>

                        <div class="form-group payment-method" style="display: flex; gap: 60px; flex-wrap: wrap;">
                        <label class="form-pay">
                            <input type="radio" id="VISA" name="payment_method" value="VISA">
{{--                            <span>{{ __('messages.credit_card') }}</span>--}}
                            <div class="payment-icons">
                                <img src="{{ asset('asset/media/payment(3).png') }}" alt="MasterCard Logo" class="payment-icon" width="100px" height="40px">
                            </div>
                        </label>
                        <label class="form-pay">
                            <input type="radio" id="MASTER" name="payment_method" value="MASTER" style=" width: 65px !important;" width="65px">
{{--                            <span>{{ __('messages.master') }}</span>--}}
                            <div class="payment-icons">
                                <img src="{{ asset('asset/media/payment(2).png') }}" alt="MasterCard Logo" class="payment-icon" width="100px" height="40px">
                            </div>
                        </label>

                        <label class="form-pay">
                            <input type="radio" id="MADA" name="payment_method" value="MADA">
{{--                            <span>{{ __('messages.mada') }}</span>--}}
                            <div class="payment-icons">
                                <img src="{{ asset('asset/media/payment(1).png') }}" alt="MasterCard Logo" class="payment-icon" width="100px" height="40px">
                            </div>
                        </label>

                        <label class="form-pay">
                            <input type="radio" id="payBranch" name="payment_method" value="payBranch">
                            <span>{{ __('messages.pay_branch1') }}</span>
                            <div class="payment-icons">
                                <img src="{{ asset('asset/media/10791041.png') }}" alt="MasterCard Logo" class="payment-icon" style="width: 55px !important;">
                            </div>
                        </label>
                    </div>

                    <!-- Confirm and Pay Button -->
                    <a href="{{ route('order') }}">
                        <button style="background-color: #e47823 !important;"
                                class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                            <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor"
                                      d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z">
                                </path>
                            </svg>
                            <span class="ml-2 mt-1">{{ __('messages.confirm_and_pay') }}</span>
                        </button>
                    </a>
                    </form>
                    <div id="floatingAlert" class="floating-alert">
                        <span id="floatingAlertMessage"></span>
                        <span class="check-icon">&#10003;</span> <!-- علامة صح -->
                    </div>
                </div>
            </div>
        </div>
</div>
