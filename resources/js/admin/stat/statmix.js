
import Chart from 'chart.js/auto';
export default {
    props:{
        data: {
            type: Object,
            required: true
          },
    },
    methods: {
      operation(data) {
        const val =  data ;
       
        const ctx = document.getElementById('myChart');
        console.log(ctx);
        const result = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
              datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        return '';
      }
    }
  };
  