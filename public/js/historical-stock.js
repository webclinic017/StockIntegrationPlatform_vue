var ctx = document.getElementById('Chart').getContext('2d');
ctx.canvas.width = 1000;
ctx.canvas.height = 250;

var chart = new Chart(ctx, {
    type: 'candlestick',
    data: {
        datasets: [
            {
                label: '蠟燭圖',
                data: res[3],
            },

        ],
    },
});
