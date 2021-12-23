<div class="card">
    <div 
        x-data="{ uploadedFinished: false}"
        x-on:livewire-upload-finish="uploadedFinished = true" 
        class="card-body bg-gray-100">
        <header>
            <h1>Recursos de la lección</h1>
        </header>
        <div>
            <hr class=" my-2">
            @if($lesson->resource)
                <div class="flex justify-between items-center">
                    <p><i wire:click='download' class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>{{ $lesson->resource->url }}</p>
                    <i wire:click='destroy' class="fas fa-trash text-red-500 cursor-pointer"></i>
                </div>
            @else
                <form wire:submit.prevent='save'>
                    <div class=" flex items-center">
                        <input wire:model='file' type="file" class=" rounded-sm flex-1">
                        <div x-show="uploadedFinished" x-cloak>
                            <button type="submit" class="px-4 py-2 ml-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">Guardar</button>
                        </div>
                    </div>
                    <div class=" text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                        <svg class="h-6 w-6 mr-1 inline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="background: none; shape-rendering: auto;" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <rect x="17.5" y="30" width="15" height="40" fill="#0051a2">
                            <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="18;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"></animate>
                            <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="64;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.2s"></animate>
                            </rect>
                            <rect x="42.5" y="30" width="15" height="40" fill="#1b75be">
                            <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"></animate>
                            <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1" begin="-0.1s"></animate>
                            </rect>
                            <rect x="67.5" y="30" width="15" height="40" fill="#408ee0">
                            <animate attributeName="y" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="20.999999999999996;30;30" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate>
                            <animate attributeName="height" repeatCount="indefinite" dur="1s" calcMode="spline" keyTimes="0;0.5;1" values="58.00000000000001;40;40" keySplines="0 0.5 0.5 1;0 0.5 0.5 1"></animate>
                            </rect>
                        </svg>
                        <span>Cargando...</span>  
                    </div>
                    @error('file')
                        <span class="text-xs text-red-500 ">{{ $message }}</span>
                    @enderror

                </form>
            @endif
        </div>
    </div>
</div>
