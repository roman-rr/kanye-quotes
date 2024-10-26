@props([
	'title' => '',
	'items' => [],
    'options' => []
])

<div class="mb-8">
    <h4 class="text-gray-700 w-bolder mb-0">{{ $title }}</h4>
    <div class="my-4">
        <input id="tagify" class="form-control form-control-solid py-4"
            @if (!Auth::user()->staff) readonly @endif
            value="{{ implode(", ", array_column($items, 'title')) }}" />
    </div>
</div>

@push('custom_scripts')
    <script>
        var apiStoreUrl = '{{route("api.categories.store")}}';
        var apiUpdateUrl = apiDestroyUrl = ('{{route("api.campaigns.categories.update", ["campaign" => request()->id, "category" => 0])}}');

        var all_categories = {!! json_encode($options) !!};
        whitelist_categories = all_categories.map((item) => {
            item.value = item.title;
            return item;
        });

        // Class definition
        var FormsTagify = function () {

            var tagify;

            // Private functions
            var tagifyInit = function (element) {
                tagify = new Tagify(document.querySelector("#tagify"), {
                    whitelist: whitelist_categories,
                    maxTags: 20,
                    placeholder: "{{ __('Type something') }}",
                    dropdown: {
                        maxItems: 30,
                        classname: "tagify__inline__suggestions",
                        enabled: 0,
                        closeOnSelect: false
                    }
                });


                tagify.on('add', onAddTag);
                tagify.on('remove', onRemoveTag);
            }

            var onAddTag = async function(ev) {
                var category = ev.detail.data;
                tagify.loading(true);

                // Tag doesn't exist - create new
                if (!category.id) {
                    var res = await fetch(apiStoreUrl, {
                            method: 'POST',
                            body: JSON.stringify({title: category.value}),
                            headers: {
                                'Content-type': 'application/json; charset=UTF-8',
                            }
                        }
                    )
                    body = await res.json();

                    // Error
                    if (res.status !== 201) {
                        tagify.loading(false);
                        tagify.removeTags(category.value);
                        throw body.message;
                        return;
                    }

                    console.warn('201 created', body);
                    category = body;

                    // update whitelist
                    all_categories.push(category);
                    tagify.whitelist = all_categories.map((item) => {
                        item.value = item.title;
                        return item;
                    });
                }

                // Assign to campaign
                var url = apiUpdateUrl.replace('0', category.id);
                var res = await fetch(url, {
                    method: 'PUT'
                });
                res = await res.json();
                console.log('res', res);
                tagify.loading(false);
            }

            var onRemoveTag = async function(ev) {
                var title = ev.detail.data.value;
                var category = all_categories.find(item => item.title === title);
                if (!category) return;
                var url = apiDestroyUrl.replace('0', category.id);
                
                tagify.loading(true);
                var res = await fetch(url, {method: 'DELETE'});
                tagify.loading(false);

                // Removed
                if (res.status === 204) {
                    console.warn('204 Removed');
                    return;
                }
                
                // Errors
                body = await res.json();
                throw body.message;
            }

            return {
                // Public Functions
                init: function () {
                    tagifyInit();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            FormsTagify.init();
        });

    </script>
@endpush
