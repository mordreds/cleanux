<script type="text/javascript">
  /* ------------------------------------------------------------------------------
   *
   *  # Echarts - chart combinations
   *
   *  Chart combination configurations
   *
   *  Version: 1.0
   *  Latest update: August 1, 2015
   *
   * ---------------------------------------------------------------------------- */

  $(function () {

      // Set paths
      // ------------------------------

      require.config({
          paths: {
              echarts: 'resources/js/plugins/visualization/echarts'
          }
      });



      // Configuration
      // ------------------------------

      require(

          // Add necessary charts
          [
            'echarts',
            'echarts/theme/limitless',
            'echarts/chart/line',
            'echarts/chart/bar',
            'echarts/chart/pie',
          ],


          // Charts setup
          function (ec, limitless) {


              // Initialize charts
              // ------------------------------

              var connect_pie = ec.init(document.getElementById('connect_pie'), limitless);
              var connect_column = ec.init(document.getElementById('connect_column'), limitless);

              // Charts options
              // ------------------------------
              // Column and pie connection
              //

              // Pie options
              connect_pie_options = {

                  // Add title
                  title: {
                      text: 'Monthly Report',
                      subtext: 'Open source data',
                      x: 'center'
                  },

                  // Add tooltip
                  tooltip: {
                      trigger: 'item',
                      formatter: "{a} <br/>{b}: {c} ({d}%)"
                  },

                  // Add legend
                  legend: {
                      orient: 'vertical',
                      x: 'left',
                      data: [<?=implode(', ', array_keys($all_services_count))?>]
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Add series
                  series: [{
                      name: 'Browser',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      center: ['50%', '57.5%'],
                      data: [
                        <?php 
                          foreach ($all_services_count as $key => $value) {
                            print "{value: ".$value.", name: ".$key."},";
                          }
                        ?>
                      ]
                  }]
              };

              // Column options
              connect_column_options = {

                  // Setup grid
                  grid: {
                      x: 40,
                      x2: 47,
                      y: 35,
                      y2: 25
                  },

                  // Add tooltip
                  tooltip: {
                      trigger: 'axis',
                      axisPointer: {
                          type: 'shadow'
                      }
                  },

                  // Add legend
                  legend: {
                      data: [<?=implode(', ', array_keys($monthly_services_count))?>]
                  },

                  // Add toolbox
                  toolbox: {
                      show: true,
                      orient: 'vertical',
                      x: 'right', 
                      y: 35,
                      feature: {
                          magicType: {
                              show: true,
                              title: {
                                  line: 'Switch to line chart',
                                  bar: 'Switch to bar chart',
                                  stack: 'Switch to stack',
                                  tiled: 'Switch to tiled'
                              },
                              type: ['line', 'bar', 'stack', 'tiled']
                          },
                          restore: {
                              show: true,
                              title: 'Restore'
                          },
                      }
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Horizontal axis
                  xAxis: [{
                      type: 'category',
                      data: ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']
                  }],

                  // Vertical axis
                  yAxis: [{
                      type: 'value',
                      splitArea: {show: true}
                  }],

                  // Add series
                  series: [
                      {
                          name: 'Internet Explorer',
                          type: 'bar',
                          stack: 'Total',
                          data: [320, 332, 301, 334, 390, 330, 320]
                      },
                      {
                          name: 'Opera',
                          type: 'bar',
                          stack: 'Total',
                          data: [120, 132, 101, 134, 90, 230, 210]
                      },
                      {
                          name: 'Safari',
                          type: 'bar',
                          stack: 'Total',
                          data: [220, 182, 191, 234, 290, 330, 310]
                      },
                      {
                          name: 'Firefox',
                          type: 'bar',
                          stack: 'Total',
                          data: [150, 232, 201, 154, 190, 330, 410]
                      },
                      {
                          name: 'Chrome',
                          type: 'bar',
                          stack: 'Total',
                          data: [820, 932, 901, 934, 1290, 1330, 1320]
                      }
                  ]
              };

              // Connect charts
              connect_pie.connect(connect_column);
              connect_column.connect(connect_pie);

              // Apply options
              // ------------------------------

              connect_pie.setOption(connect_pie_options);
              connect_column.setOption(connect_column_options);



              // Resize charts
              // ------------------------------

              window.onresize = function () {
                  setTimeout(function (){
                      buildPieSeries();
                      connect_pie.resize();
                      connect_column.resize();
                  }, 200);
              }
          }
      );
  });

/* ------------------------------------------------------------------------------
*
*  # Statistics widgets
*
*  Specific JS code additions for general_widgets_stats.html page
*
*  Version: 1.0
*  Latest update: Mar 20, 2017
*
* ---------------------------------------------------------------------------- */

$(function() {
  // Simple line chart
  // ------------------------------

  // Initialize chart
  lineChartWidget('#line_chart_simple', 50, '#2196F3', 'rgba(33,150,243,0.5)', '#2196F3', '#fff');

  // Chart setup
  function lineChartWidget(element, chartHeight, lineColor, pathColor, pointerLineColor, pointerBgColor) {


      // Basic setup
      // ------------------------------

      // Add data set
      var dataset = [
          {
              "date": "04/13/14",
              "alpha": "60"
          }, {
              "date": "04/14/14",
              "alpha": "35"
          }, {
              "date": "04/15/14",
              "alpha": "65"
          }, {
              "date": "04/16/14",
              "alpha": "50"
          }, {
              "date": "04/17/14",
              "alpha": "65"
          }, {
              "date": "04/18/14",
              "alpha": "20"
          }, {
              "date": "04/19/14",
              "alpha": "60"
          }
      ];

      // Main variables
      var d3Container = d3.select(element),
          margin = {top: 0, right: 0, bottom: 0, left: 0},
          width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right,
          height = chartHeight - margin.top - margin.bottom,
          padding = 20;

      // Format date
      var parseDate = d3.time.format("%m/%d/%y").parse,
          formatDate = d3.time.format("%a, %B %e");


      // Add tooltip
      // ------------------------------

      var tooltip = d3.tip()
          .attr('class', 'd3-tip')
          .html(function (d) {
              return "<ul class='list-unstyled mb-5'>" +
                  "<li>" + "<div class='text-size-base mt-5 mb-5'><i class='icon-check2 position-left'></i>" + formatDate(d.date) + "</div>" + "</li>" +
                  "<li>" + "Sales: &nbsp;" + "<span class='text-semibold pull-right'>" + d.alpha + "</span>" + "</li>" +
                  "<li>" + "Revenue: &nbsp; " + "<span class='text-semibold pull-right'>" + "$" + (d.alpha * 25).toFixed(2) + "</span>" + "</li>" + 
              "</ul>";
          });


      // Create chart
      // ------------------------------

      // Add svg element
      var container = d3Container.append('svg');

      // Add SVG group
      var svg = container
              .attr('width', width + margin.left + margin.right)
              .attr('height', height + margin.top + margin.bottom)
              .append("g")
                  .attr("transform", "translate(" + margin.left + "," + margin.top + ")")
                  .call(tooltip);


      // Load data
      // ------------------------------

      dataset.forEach(function (d) {
          d.date = parseDate(d.date);
          d.alpha = +d.alpha;
      });


      // Construct scales
      // ------------------------------

      // Horizontal
      var x = d3.time.scale()
          .range([padding, width - padding]);

      // Vertical
      var y = d3.scale.linear()
          .range([height, 5]);


      // Set input domains
      // ------------------------------

      // Horizontal
      x.domain(d3.extent(dataset, function (d) {
          return d.date;
      }));

      // Vertical
      y.domain([0, d3.max(dataset, function (d) {
          return Math.max(d.alpha);
      })]);


      // Construct chart layout
      // ------------------------------

      // Line
      var line = d3.svg.line()
          .x(function(d) {
              return x(d.date);
          })
          .y(function(d) {
              return y(d.alpha);
          });


      //
      // Append chart elements
      //

      // Add mask for animation
      // ------------------------------

      // Add clip path
      var clip = svg.append("defs")
          .append("clipPath")
          .attr("id", "clip-line-small");

      // Add clip shape
      var clipRect = clip.append("rect")
          .attr('class', 'clip')
          .attr("width", 0)
          .attr("height", height);

      // Animate mask
      clipRect
            .transition()
                .duration(1000)
                .ease('linear')
                .attr("width", width);


      // Line
      // ------------------------------

      // Path
      var path = svg.append('path')
          .attr({
              'd': line(dataset),
              "clip-path": "url(#clip-line-small)",
              'class': 'd3-line d3-line-medium'
          })
          .style('stroke', lineColor);

      // Animate path
      svg.select('.line-tickets')
          .transition()
              .duration(1000)
              .ease('linear');


      // Add vertical guide lines
      // ------------------------------

      // Bind data
      var guide = svg.append('g')
          .selectAll('.d3-line-guides-group')
          .data(dataset);

      // Append lines
      guide
          .enter()
          .append('line')
              .attr('class', 'd3-line-guides')
              .attr('x1', function (d, i) {
                  return x(d.date);
              })
              .attr('y1', function (d, i) {
                  return height;
              })
              .attr('x2', function (d, i) {
                  return x(d.date);
              })
              .attr('y2', function (d, i) {
                  return height;
              })
              .style('stroke', pathColor)
              .style('stroke-dasharray', '4,2')
              .style('shape-rendering', 'crispEdges');

      // Animate guide lines
      guide
          .transition()
              .duration(1000)
              .delay(function(d, i) { return i * 150; })
              .attr('y2', function (d, i) {
                  return y(d.alpha);
              });


      // Alpha app points
      // ------------------------------

      // Add points
      var points = svg.insert('g')
          .selectAll('.d3-line-circle')
          .data(dataset)
          .enter()
          .append('circle')
              .attr('class', 'd3-line-circle d3-line-circle-medium')
              .attr("cx", line.x())
              .attr("cy", line.y())
              .attr("r", 3)
              .style({
                  'stroke': pointerLineColor,
                  'fill': pointerBgColor
              });

      // Animate points on page load
      points
          .style('opacity', 0)
          .transition()
              .duration(250)
              .ease('linear')
              .delay(1000)
              .style('opacity', 1);

      // Add user interaction
      points
          .on("mouseover", function (d) {
              tooltip.offset([-10, 0]).show(d);

              // Animate circle radius
              d3.select(this).transition().duration(250).attr('r', 4);
          })

          // Hide tooltip
          .on("mouseout", function (d) {
              tooltip.hide(d);

              // Animate circle radius
              d3.select(this).transition().duration(250).attr('r', 3);
          });

      // Change tooltip direction of first point
      d3.select(points[0][0])
          .on("mouseover", function (d) {
              tooltip.offset([0, 10]).direction('e').show(d);

              // Animate circle radius
              d3.select(this).transition().duration(250).attr('r', 4);
          })
          .on("mouseout", function (d) {
              tooltip.direction('n').hide(d);

              // Animate circle radius
              d3.select(this).transition().duration(250).attr('r', 3);
          });

      // Change tooltip direction of last point
      d3.select(points[0][points.size() - 1])
          .on("mouseover", function (d) {
              tooltip.offset([0, -10]).direction('w').show(d);

              // Animate circle radius
              d3.select(this).transition().duration(250).attr('r', 4);
          })
          .on("mouseout", function (d) {
              tooltip.direction('n').hide(d);

              // Animate circle radius
              d3.select(this).transition().duration(250).attr('r', 3);
          });


      // Resize chart
      // ------------------------------

      // Call function on window resize
      $(window).on('resize', lineChartResize);

      // Call function on sidebar width change
      $(document).on('click', '.sidebar-control', lineChartResize);

      // Resize function
      // 
      // Since D3 doesn't support SVG resize by default,
      // we need to manually specify parts of the graph that need to 
      // be updated on window resize
      function lineChartResize() {

          // Layout variables
          width = d3Container.node().getBoundingClientRect().width - margin.left - margin.right;


          // Layout
          // -------------------------

          // Main svg width
          container.attr("width", width + margin.left + margin.right);

          // Width of appended group
          svg.attr("width", width + margin.left + margin.right);

          // Horizontal range
          x.range([padding, width - padding]);


          // Chart elements
          // -------------------------

          // Mask
          clipRect.attr("width", width);

          // Line path
          svg.selectAll('.d3-line').attr("d", line(dataset));

          // Circles
          svg.selectAll('.d3-line-circle').attr("cx", line.x());

          // Guide lines
          svg.selectAll('.d3-line-guides')
              .attr('x1', function (d, i) {
                  return x(d.date);
              })
              .attr('x2', function (d, i) {
                  return x(d.date);
              });
      }
  }

});



</script>