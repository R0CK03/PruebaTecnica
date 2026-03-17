<div>
    <div style="margin-bottom: 20px;">
        <label><strong>Selecciona un Indicador:</strong></label>
        <select wire:model.live="indicadorSeleccionado" style="padding: 5px; margin-left: 10px;">
            <option value="Huella de Carbono">Huella de Carbono</option>
            <option value="Consumo de Agua">Consumo de Agua</option>
        </select>
    </div>

    <div style="display: flex; gap: 30px;">
        
        <div style="width: 30%;">
            <table border="1" style="width: 100%; border-collapse: collapse; text-align: center;">
                <thead style="background-color: #f3f4f6;">
                    <tr>
                        <th style="padding: 8px;">Mes</th>
                        <th style="padding: 8px;">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $dato)
                        <tr>
                            <td style="padding: 8px;">{{ $dato->measured_at }}</td>
                            <td style="padding: 8px;">{{ $dato->value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="width: 70%;" wire:ignore>
            <div id="miGrafico"></div>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            // Inicializar gráfico con los datos de la primera carga usano json
            let opciones = {
                chart: { type: 'area', height: 350 },
                series: [{ name: 'Valor', data: @json($datos->pluck('value')) }],
                xaxis: { categories: @json($datos->pluck('measured_at')) },
                colors: ['#00E396']
            };

            let chart = new ApexCharts(document.querySelector("#miGrafico"), opciones);
            chart.render();

            // Escuchar cambios desde el menú desplegable (Livewire)
            Livewire.on('actualizarGrafico', (event) => {
                let info = event[0]; 
                chart.updateSeries([{ data: info.valores }]);
                chart.updateOptions({ xaxis: { categories: info.meses } });
            });
        });
    </script>
</div>