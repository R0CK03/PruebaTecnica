<div>
    <div style="margin-bottom: 20px;">
        <label><strong>Selecciona un Indicador:</strong></label>
        <select wire:model.live="indicadorSeleccionado" style="padding: 5px; margin-left: 10px;">
            <option value="Huella de Carbono">Huella de Carbono</option>
            <option value="Consumo de Agua">Consumo de Agua</option>
        </select>
    </div>

    <div style="display: flex; gap: 20px; align-items: flex-start;">
        
        <div style="width: 35%;">
            <table style="width: 100%; border-collapse: collapse; font-family: sans-serif; border: 1px solid #ddd;">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th style="padding: 10px; border: 1px solid #ddd;">Mes</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Valor</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $index => $dato)
                        <tr>
                            <td style="padding: 8px; border: 1px solid #ddd; text-align: center;">
                                {{ \Carbon\Carbon::parse($dato->measured_at)->format('M Y') }}
                            </td>
                            <td style="padding: 8px; border: 1px solid #ddd; text-align: center; font-weight: bold;">
                                {{ number_format($dato->value, 1) }}
                            </td>
                            <td style="padding: 8px; border: 1px solid #ddd; text-align: center;">
                                @if($index > 0)
                                    {{-- Comparar valor actual con el anterior usando el índice del loop --}}
                                    @php $anterior = $datos[$index - 1]->value; @endphp

                                    @if($dato->value > $anterior)
                                        <b style="color: #b91c1c;">Aumento</b>
                                    @elseif($dato->value < $anterior)
                                        <b style="color: #15803d;">Mejora</b>
                                    @else
                                        <span style="color: #666;">Sin cambios</span>
                                    @endif
                                @else
                                    <small style="color: #999;">-</small>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="width: 65%;" wire:ignore>
            <div id="miGrafico"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            let opciones = {
                chart: { type: 'area', height: 380, toolbar: { show: false } },
                series: [{ name: 'Valor', data: @json($datos->pluck('value')) }],
                xaxis: { categories: @json($datos->pluck('measured_at')) },
                colors: ['#00E396'],
                dataLabels: { enabled: true }
            };

            let chart = new ApexCharts(document.querySelector("#miGrafico"), opciones);
            chart.render();

            Livewire.on('actualizarGrafico', (event) => {
                let info = event[0]; 
                chart.updateSeries([{ data: info.valores }]);
                chart.updateOptions({ xaxis: { categories: info.meses } });
            });
        });
    </script>
</div>