<script type="text/javascript">
$(function() {
    // Pie with progress bar
    // ------------------------------

    // Initialize chart
    pieWithProgress("#january_report", 146);
    pieWithProgress("#january1_report", 146);

    pieWithProgress("#febuary_report", 146);
    pieWithProgress("#febuary1_report", 146);

    pieWithProgress("#march_report", 146);
    pieWithProgress("#march1_report", 146);

    pieWithProgress("#april_report", 146);
    pieWithProgress("#april1_report", 146);

    pieWithProgress("#may_report", 146);
    pieWithProgress("#may1_report", 146);

    pieWithProgress("#june_report", 146);
    pieWithProgress("#june1_report", 146);

    pieWithProgress("#july_report", 146);
    pieWithProgress("#july1_report", 146);

    pieWithProgress("#august_report", 146);
    pieWithProgress("#august1_report", 146);

    pieWithProgress("#september_report", 146);
    pieWithProgress("#september1_report", 146);

    pieWithProgress("#october_report", 146);
    pieWithProgress("#october1_report", 146);

    pieWithProgress("#november_report", 146);
    pieWithProgress("#november1_report", 146);

    pieWithProgress("#december_report", 146);
    pieWithProgress("#december1_report", 146);

    // Chart setup
    function pieWithProgress(element, size) {

        // Demo dataset
        var dataset = [
                { name: 'New', count: 639 },
                { name: 'Pending', count: 255 },
                { name: 'Shipped', count: 215 }
            ];

        // Main variables
        var d3Container = d3.select(element),
            total = 0,
            width = size,
            height = size,
            progressSpacing = 6,
            progressSize = (progressSpacing + 2),
            arcSize = 20,
            outerRadius = (width / 2),
            innerRadius = (outerRadius - arcSize);

        // Colors
        var color = d3.scale.ordinal()
            .range(['#EF5350', '#29b6f6', '#66BB6A']);


        // Create chart
        // ------------------------------

        // Add svg element
        var container = d3Container.append("svg");
        
        // Add SVG group
        var svg = container
            .attr("width", width)
            .attr("height", height)
            .append("g")
                .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");


        // Construct chart layout
        // ------------------------------

        // Add dataset
        dataset.forEach(function(d){
            total+= d.count;
        });

        // Pie layout
        var pie = d3.layout.pie()
            .value(function(d){ return d.count; })
            .sort(null);

        // Inner arc
        var arc = d3.svg.arc()
            .innerRadius(innerRadius)
            .outerRadius(outerRadius);

        // Line arc
        var arcLine = d3.svg.arc()
            .innerRadius(innerRadius - progressSize)
            .outerRadius(innerRadius - progressSpacing)
            .startAngle(0);


        // Append chart elements
        // ------------------------------

        //
        // Animations
        //
        var arcTween = function(transition, newAngle) {
            transition.attrTween("d", function (d) {
                var interpolate = d3.interpolate(d.endAngle, newAngle);
                var interpolateCount = d3.interpolate(0, dataset[0].count);
                return function (t) {
                    d.endAngle = interpolate(t);
                    middleCount.text(d3.format(",d")(Math.floor(interpolateCount(t))));
                    return arcLine(d);
                };
            });
        };


        //
        // Donut paths
        //

        // Donut
        var path = svg.selectAll('path')
            .data(pie(dataset))
            .enter()
            .append('path')
            .attr('d', arc)
            .attr('fill', function(d, i) {
                return color(d.data.name);
            })
            .style({
                'stroke': '#fff',
                'stroke-width': 2,
                'cursor': 'pointer'
            });

        // Animate donut
        path
            .transition()
            .delay(function(d, i) { return i; })
            .duration(600)
            .attrTween("d", function(d) {
                var interpolate = d3.interpolate(d.startAngle, d.endAngle);
                return function(t) {
                    d.endAngle = interpolate(t);
                    return arc(d);  
                }; 
            });


        //
        // Line path 
        //

        // Line
        var pathLine = svg.append('path')
            .datum({endAngle: 0})
            .attr('d', arcLine)
            .style({
                fill: color('New')
            });

        // Line animation
        pathLine.transition()
            .duration(600)
            .delay(300)
            .call(arcTween, (2 * Math.PI) * (dataset[0].count / total));


        //
        // Add count text
        //

        var middleCount = svg.append('text')
            .datum(0)
            .attr('dy', 6)
            .style({
                'font-size': '21px',
                'font-weight': 500,
                'text-anchor': 'middle'
            })
            .text(function(d){
                return d;
            });            


        //
        // Add interactions
        //

        // Mouse
        path
            .on('mouseover', function(d, i) {
                $(element + ' [data-slice]').css({
                    'opacity': 0.3,
                    'transition': 'all ease-in-out 0.15s'
                });
                $(element + ' [data-slice=' + i + ']').css({'opacity': 1});
            })
            .on('mouseout', function(d, i) {
                $(element + ' [data-slice]').css('opacity', 1);
            });


        //
        // Add legend
        //

        // Append list
        var legend = d3.select(element)
            .append('ul')
            .attr('class', 'chart-widget-legend')
            .selectAll('li')
            .data(pie(dataset))
            .enter()
            .append('li')
            .attr('data-slice', function(d, i) {
                return i;
            })
            .attr('style', function(d, i) {
                return 'border-bottom: solid 2px ' + color(d.data.name);
            })
            .text(function(d, i) {
                return d.data.name + ': ';
            });

        // Append legend text
        legend.append('span')
            .text(function(d, i) {
                return d.data.count;
            });
    }

});
</script>