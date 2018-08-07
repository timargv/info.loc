@if ($errors->any())

                <div class="has-error">

                        @foreach ($errors->all() as $error)
                            <span class="help-block">{{ $error }}</span>
                        @endforeach

                </div>
@endif