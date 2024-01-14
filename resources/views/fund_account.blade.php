<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Fund Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8"  role="form">
                <div class="space-y-12" style="margin-bottom:40px;">
                    <div class="col-md-8 col-md-offset-2">

                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <input type="hidden" name="orderID" value="345">
                        <input type="hidden" name="quantity" value="100">
                        <input type="hidden" name="currency" value="KES">
                        <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" >
                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="mt-10 grid grid-cols-1 p-8 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
                                <div class="mt-2">
                                    <input
                                        type="number"
                                        name="amount"
                                        id="amount"
                                        value="amount"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>

                        <p>
                            <button
                                class="inline-block ml-8 flex-1 rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 sm:flex-none md:text-base"
                                type="submit"
                                value="Pay Now!">
                                <i class="fa fa-plus-circle fa-lg"></i> Pay with PayStack!
                            </button>
                        </p>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

</x-app-layout>
