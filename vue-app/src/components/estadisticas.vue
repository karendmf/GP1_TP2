<template>
    <div id="estadisticas">
        <GChart          
            type="PieChart"                       
            @ready="onChartReady"
            />
    </div>
</template>
<script>
import axios from 'axios'
import moment from 'moment'
import {
    GChart
} from 'vue-google-charts'
export default {
    name: 'estadisticas',
    components: {
        GChart

    },
    data() {
        return {
            // Array will be automatically processed with visualization.arrayToDataTable function
            moment: moment
        };
    },
    mounted() {
        moment.locale('es')
    },
    methods: {
        onChartReady(chart, google) {
            axios.get('http://localhost:8000/api/informes')
                .then(function (response) {

                    const jsonData = response.data;
                    
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'mes');
                    data.addColumn('number', 'cantidad');

                    var meses = [];
                    var val;
                    for (val of jsonData) {
                        meses.push(moment(val.fechalimite).format('MMMM'))
                    }

                    var compressed = [];
                    var copy = meses.slice(0);

                    for (var i = 0; i < meses.length; i++) {
                        var myCount = 0;
                        for (var w = 0; w < copy.length; w++) {
                            if (meses[i] == copy[w]) {
                                myCount++;
                                delete copy[w];
                            }
                        }

                        if (myCount > 0) {
                            var a = new Object();
                            a.value = meses[i];
                            a.count = myCount;
                            compressed.push(a);
                        }
                    }
                    //console.log('datos: ', compressed);
                    var dato;
                    for (dato of compressed) {
                        data.addRow([dato.value, dato.count])
                    }
                    const options = {
                        title: "Informes a cerrar por mes"
                    }

                    chart.draw(data, options);
                });
        }
    }
}
</script>
