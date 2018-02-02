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
  
  /* ------------------------------------------------------------------------------
   *
   *  # Echarts - pies and donuts
   *
   *  Pies and donuts chart configurations
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
          [
              'echarts',
              'echarts/theme/limitless',
              'echarts/chart/pie',
              'echarts/chart/funnel'
          ],


          // Charts setup
          function (ec, limitless) {


              // Initialize charts
              // ------------------------------

              var basic_pie = ec.init(document.getElementById('basic_pie'), limitless);
              var basic_donut = ec.init(document.getElementById('basic_donut'), limitless);
              var nested_pie = ec.init(document.getElementById('nested_pie'), limitless);
              var infographic_donut = ec.init(document.getElementById('infographic_donut'), limitless);
              var rose_diagram_hidden = ec.init(document.getElementById('rose_diagram_hidden'), limitless);
              var rose_diagram_visible = ec.init(document.getElementById('rose_diagram_visible'), limitless);
              var lasagna_donut = ec.init(document.getElementById('lasagna_donut'), limitless);
              var pie_timeline = ec.init(document.getElementById('pie_timeline'), limitless);
              var multiple_donuts = ec.init(document.getElementById('multiple_donuts'), limitless);


              // Charts setup
              // ------------------------------                    

              //
              // Basic pie options
              //

              basic_pie_options = {

                  // Add title
                  title: {
                      text: 'Browser popularity',
                      subtext: 'Open source information',
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
                      data: ['IE', 'Opera', 'Safari', 'Firefox', 'Chrome']
                  },

                  // Display toolbox
                  toolbox: {
                      show: true,
                      orient: 'vertical',
                      feature: {
                          mark: {
                              show: true,
                              title: {
                                  mark: 'Markline switch',
                                  markUndo: 'Undo markline',
                                  markClear: 'Clear markline'
                              }
                          },
                          dataView: {
                              show: true,
                              readOnly: false,
                              title: 'View data',
                              lang: ['View chart data', 'Close', 'Update']
                          },
                          magicType: {
                              show: true,
                              title: {
                                  pie: 'Switch to pies',
                                  funnel: 'Switch to funnel',
                              },
                              type: ['pie', 'funnel'],
                              option: {
                                  funnel: {
                                      x: '25%',
                                      y: '20%',
                                      width: '50%',
                                      height: '70%',
                                      funnelAlign: 'left',
                                      max: 1548
                                  }
                              }
                          },
                          restore: {
                              show: true,
                              title: 'Restore'
                          },
                          saveAsImage: {
                              show: true,
                              title: 'Same as image',
                              lang: ['Save']
                          }
                      }
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Add series
                  series: [{
                      name: 'Browsers',
                      type: 'pie',
                      radius: '70%',
                      center: ['50%', '57.5%'],
                      data: [
                          {value: 335, name: 'IE'},
                          {value: 310, name: 'Opera'},
                          {value: 234, name: 'Safari'},
                          {value: 135, name: 'Firefox'},
                          {value: 1548, name: 'Chrome'}
                      ]
                  }]
              };


              //
              // Basic donut options
              //

              basic_donut_options = {

                  // Add title
                  title: {
                      text: 'Browser popularity',
                      subtext: 'Open source information',
                      x: 'center'
                  },

                  // Add legend
                  legend: {
                      orient: 'vertical',
                      x: 'left',
                      data: ['Internet Explorer','Opera','Safari','Firefox','Chrome']
                  },

                  // Display toolbox
                  toolbox: {
                      show: true,
                      orient: 'vertical',
                      feature: {
                          mark: {
                              show: true,
                              title: {
                                  mark: 'Markline switch',
                                  markUndo: 'Undo markline',
                                  markClear: 'Clear markline'
                              }
                          },
                          dataView: {
                              show: true,
                              readOnly: false,
                              title: 'View data',
                              lang: ['View chart data', 'Close', 'Update']
                          },
                          magicType: {
                              show: true,
                              title: {
                                  pie: 'Switch to pies',
                                  funnel: 'Switch to funnel',
                              },
                              type: ['pie', 'funnel'],
                              option: {
                                  funnel: {
                                      x: '25%',
                                      y: '20%',
                                      width: '50%',
                                      height: '70%',
                                      funnelAlign: 'left',
                                      max: 1548
                                  }
                              }
                          },
                          restore: {
                              show: true,
                              title: 'Restore'
                          },
                          saveAsImage: {
                              show: true,
                              title: 'Same as image',
                              lang: ['Save']
                          }
                      }
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Add series
                  series: [
                      {
                          name: 'Browsers',
                          type: 'pie',
                          radius: ['50%', '70%'],
                          center: ['50%', '57.5%'],
                          itemStyle: {
                              normal: {
                                  label: {
                                      show: true
                                  },
                                  labelLine: {
                                      show: true
                                  }
                              },
                              emphasis: {
                                  label: {
                                      show: true,
                                      formatter: '{b}' + '\n\n' + '{c} ({d}%)',
                                      position: 'center',
                                      textStyle: {
                                          fontSize: '17',
                                          fontWeight: '500'
                                      }
                                  }
                              }
                          },

                          data: [
                              {value: 335, name: 'Internet Explorer'},
                              {value: 310, name: 'Opera'},
                              {value: 234, name: 'Safari'},
                              {value: 135, name: 'Firefox'},
                              {value: 1548, name: 'Chrome'}
                          ]
                      }
                  ]
              };


              //
              // Nested pie charts options
              //

              nested_pie_options = {

                  // Add tooltip
                  tooltip: {
                      trigger: 'item',
                      formatter: "{a} <br/>{b}: {c} ({d}%)"
                  },

                  // Add legend
                  legend: {
                      orient: 'vertical',
                      x: 'left',
                      data: ['Italy','Spain','Austria','Germany','Poland','Denmark','Hungary','Portugal','France','Netherlands']
                  },

                  // Display toolbox
                  toolbox: {
                      show: true,
                      orient: 'vertical',
                      feature: {
                          mark: {
                              show: true,
                              title: {
                                  mark: 'Markline switch',
                                  markUndo: 'Undo markline',
                                  markClear: 'Clear markline'
                              }
                          },
                          dataView: {
                              show: true,
                              readOnly: false,
                              title: 'View data',
                              lang: ['View chart data', 'Close', 'Update']
                          },
                          magicType: {
                              show: true,
                              title: {
                                  pie: 'Switch to pies',
                                  funnel: 'Switch to funnel',
                              },
                              type: ['pie', 'funnel']
                          },
                          restore: {
                              show: true,
                              title: 'Restore'
                          },
                          saveAsImage: {
                              show: true,
                              title: 'Same as image',
                              lang: ['Save']
                          }
                      }
                  },

                  // Enable drag recalculate
                  calculable: false,

                  // Add series
                  series: [

                      // Inner
                      {
                          name: 'Countries',
                          type: 'pie',
                          selectedMode: 'single',
                          radius: [0, '40%'],

                          // for funnel
                          x: '15%',
                          y: '7.5%',
                          width: '40%',
                          height: '85%',
                          funnelAlign: 'right',
                          max: 1548,

                          itemStyle: {
                              normal: {
                                  label: {
                                      position: 'inner'
                                  },
                                  labelLine: {
                                      show: false
                                  }
                              },
                              emphasis: {
                                  label: {
                                      show: true
                                  }
                              }
                          },

                          data: [
                              {value: 535, name: 'Italy'},
                              {value: 679, name: 'Spain'},
                              {value: 1548, name: 'Austria'}
                          ]
                      },

                      // Outer
                      {
                          name: 'Countries',
                          type: 'pie',
                          radius: ['60%', '85%'],

                          // for funnel
                          x: '55%',
                          y: '7.5%',
                          width: '35%',
                          height: '85%',
                          funnelAlign: 'left',
                          max: 1048,

                          data: [
                              {value: 535, name: 'Italy'},
                              {value: 310, name: 'Germany'},
                              {value: 234, name: 'Poland'},
                              {value: 135, name: 'Denmark'},
                              {value: 948, name: 'Hungary'},
                              {value: 251, name: 'Portugal'},
                              {value: 147, name: 'France'},
                              {value: 202, name: 'Netherlands'}
                          ]
                      }
                  ]
              };


              //
              // Infographic donut options
              //

              // Data style
              var dataStyle = {
                  normal: {
                      label: {show: false},
                      labelLine: {show: false}
                  }
              };

              // Placeholder style
              var placeHolderStyle = {
                  normal: {
                      color: 'rgba(0,0,0,0)',
                      label: {show: false},
                      labelLine: {show: false}
                  },
                  emphasis: {
                      color: 'rgba(0,0,0,0)'
                  }
              };

              // Set options
              infographic_donut_options = {

                  // Add title
                  title: {
                      text: 'Are you happy?',
                      subtext: 'Utrecht, Netherlands',
                      x: 'center',
                      y: 'center',
                      itemGap: 10,
                      textStyle: {
                          color: 'rgba(30,144,255,0.8)',
                          fontSize: 19,
                          fontWeight: '500'
                      }
                  },

                  // Add tooltip
                  tooltip: {
                      show: true,
                      formatter: "{a} <br/>{b}: {c} ({d}%)"
                  },

                  // Add legend
                  legend: {
                      orient: 'vertical',
                      x: document.getElementById('infographic_donut').offsetWidth / 2,
                      y: 30,
                      x: '55%',
                      itemGap: 15,
                      data: ['60% Definitely yes','30% Could be better','10% Not at the moment']
                  },

                  // Add series
                  series: [
                      {
                          name: '1',
                          type: 'pie',
                          clockWise: false,
                          radius: ['75%', '90%'],
                          itemStyle: dataStyle,
                          data: [
                              {
                                  value: 60,
                                  name: '60% Definitely yes'
                              },
                              {
                                  value: 40,
                                  name: 'invisible',
                                  itemStyle: placeHolderStyle
                              }
                          ]
                      },

                      {
                          name: '2',
                          type:'pie',
                          clockWise: false,
                          radius: ['60%', '75%'],
                          itemStyle: dataStyle,
                          data: [
                              {
                                  value: 30, 
                                  name: '30% Could be better'
                              },
                              {
                                  value: 70,
                                  name: 'invisible',
                                  itemStyle: placeHolderStyle
                              }
                          ]
                      },

                      {
                          name: '3',
                          type: 'pie',
                          clockWise: false,
                          radius: ['45%', '60%'],
                          itemStyle: dataStyle,
                          data: [
                              {
                                  value: 10, 
                                  name: '10% Not at the moment'
                              },
                              {
                                  value: 90,
                                  name: 'invisible',
                                  itemStyle: placeHolderStyle
                              }
                          ]
                      }
                  ]
              };


              //
              // Nightingale roses with hidden labels options
              //

              rose_diagram_hidden_options = {

                  // Add title
                  title: {
                      text: 'Employee\'s salary review',
                      subtext: 'Senior front end developer',
                      x: 'center'
                  },

                  // Add tooltip
                  tooltip: {
                      trigger: 'item',
                      formatter: "{a} <br/>{b}: +{c}$ ({d}%)"
                  },

                  // Add legend
                  legend: {
                      x: 'left',
                      y: 'top',
                      orient: 'vertical',
                      data: ['January','February','March','April','May','June','July','August','September','October','November','December']
                  },

                  // Display toolbox
                  toolbox: {
                      show: true,
                      orient: 'vertical',
                      feature: {
                          mark: {
                              show: true,
                              title: {
                                  mark: 'Markline switch',
                                  markUndo: 'Undo markline',
                                  markClear: 'Clear markline'
                              }
                          },
                          dataView: {
                              show: true,
                              readOnly: false,
                              title: 'View data',
                              lang: ['View chart data', 'Close', 'Update']
                          },
                          magicType: {
                              show: true,
                              title: {
                                  pie: 'Switch to pies',
                                  funnel: 'Switch to funnel',
                              },
                              type: ['pie', 'funnel']
                          },
                          restore: {
                              show: true,
                              title: 'Restore'
                          },
                          saveAsImage: {
                              show: true,
                              title: 'Same as image',
                              lang: ['Save']
                          }
                      }
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Add series
                  series: [
                      {
                          name: 'Increase (brutto)',
                          type: 'pie',
                          radius: ['15%', '73%'],
                          center: ['50%', '57%'],
                          roseType: 'radius',

                          // Funnel
                          width: '40%',
                          height: '78%',
                          x: '30%',
                          y: '17.5%',
                          max: 450,

                          itemStyle: {
                              normal: {
                                  label: {
                                      show: false
                                  },
                                  labelLine: {
                                      show: false
                                  }
                              },
                              emphasis: {
                                  label: {
                                      show: true
                                  },
                                  labelLine: {
                                      show: true
                                  }
                              }
                          },
                          data: [
                              {value: 440, name: 'January'},
                              {value: 260, name: 'February'},
                              {value: 350, name: 'March'},
                              {value: 250, name: 'April'},
                              {value: 210, name: 'May'},
                              {value: 350, name: 'June'},
                              {value: 300, name: 'July'},
                              {value: 430, name: 'August'},
                              {value: 400, name: 'September'},
                              {value: 450, name: 'October'},
                              {value: 330, name: 'November'},
                              {value: 200, name: 'December'}
                          ]
                      }
                  ]
              };


              //
              // Nightingale roses with visible labels options
              //

              rose_diagram_visible_options = {

                  // Add title
                  title: {
                      text: 'Employee\'s salary review',
                      subtext: 'Senior front end developer',
                      x: 'center'
                  },

                  // Add tooltip
                  tooltip: {
                      trigger: 'item',
                      formatter: "{a} <br/>{b}: +{c}$ ({d}%)"
                  },

                  // Add legend
                  legend: {
                      x: 'left',
                      y: 'top',
                      orient: 'vertical',
                      data: ['January','February','March','April','May','June','July','August','September','October','November','December']
                  },

                  // Display toolbox
                  toolbox: {
                      show: true,
                      orient: 'vertical',
                      feature: {
                          mark: {
                              show: true,
                              title: {
                                  mark: 'Markline switch',
                                  markUndo: 'Undo markline',
                                  markClear: 'Clear markline'
                              }
                          },
                          dataView: {
                              show: true,
                              readOnly: false,
                              title: 'View data',
                              lang: ['View chart data', 'Close', 'Update']
                          },
                          magicType: {
                              show: true,
                              title: {
                                  pie: 'Switch to pies',
                                  funnel: 'Switch to funnel',
                              },
                              type: ['pie', 'funnel']
                          },
                          restore: {
                              show: true,
                              title: 'Restore'
                          },
                          saveAsImage: {
                              show: true,
                              title: 'Same as image',
                              lang: ['Save']
                          }
                      }
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Add series
                  series: [
                      {
                          name: 'Increase (brutto)',
                          type: 'pie',
                          radius: ['15%', '73%'],
                          center: ['50%', '57%'],
                          roseType: 'area',

                          // Funnel
                          width: '40%',
                          height: '78%',
                          x: '30%',
                          y: '17.5%',
                          max: 450,
                          sort: 'ascending',

                          data: [
                              {value: 440, name: 'January'},
                              {value: 260, name: 'February'},
                              {value: 350, name: 'March'},
                              {value: 250, name: 'April'},
                              {value: 210, name: 'May'},
                              {value: 350, name: 'June'},
                              {value: 300, name: 'July'},
                              {value: 430, name: 'August'},
                              {value: 400, name: 'September'},
                              {value: 450, name: 'October'},
                              {value: 330, name: 'November'},
                              {value: 200, name: 'December'}
                          ]
                      }
                  ]
              };


              //
              // Lasagna options
              //

              lasagna_donut_options = {

                  // Add title
                  title: {
                      text: 'Browser statistics',
                      subtext: 'Based on shared research',
                      x: 'center'
                  },

                  // Add tooltip
                  tooltip: {
                      trigger: 'item',
                      formatter: '{a} <br/>{b}: {c} ({d}%)'
                  },

                  // Add legend
                  legend: {
                      x: 'left',
                      orient: 'vertical',
                      data: ['Chrome','Firefox','Safari','IE9+','IE8-']
                  },

                  // Enable drag recalculate
                  calculable: false,

                  // Add series
                  series: (function () {
                      var series = [];
                      for (var i = 0; i < 30; i++) {
                          series.push({
                              name: 'Browser',
                              type: 'pie',
                              itemStyle: {
                                  normal: {
                                      label: {
                                          show: i > 28
                                      },
                                      labelLine: {
                                          show: i > 28,
                                          length: 20
                                      }
                                  }
                              },

                              radius: [i * 3.6 + 40, i * 3.6 + 43],
                              center: ['50%', '55%'],
                              data: [
                                  {value: i * 128 + 80,  name: 'Chrome'},
                                  {value: i * 64  + 160,  name: 'Firefox'},
                                  {value: i * 32  + 320,  name: 'Safari'},
                                  {value: i * 16  + 640,  name: 'IE9+'},
                                  {value: i * 8  + 1280, name: 'IE8-'}
                              ]
                          })
                      }
                      return series;
                  })()
              };


              //
              // Pie timeline options
              //

              var idx = 1;
              pie_timeline_options = {

                  // Add timeline
                  timeline: {
                      x: 10,
                      x2: 10,
                      data: [
                          '2014-01-01', '2014-02-01', '2014-03-01', '2014-04-01', '2014-05-01',
                          { name:'2014-06-01', symbol: 'emptyStar2', symbolSize: 8 },
                          '2014-07-01', '2014-08-01', '2014-09-01', '2014-10-01', '2014-11-01',
                          { name:'2014-12-01', symbol: 'star2', symbolSize: 8 }
                      ],
                      label: {
                          formatter: function(s) {
                              return s.slice(0, 7);
                          }
                      },
                      autoPlay: true,
                      playInterval: 3000
                  },

                  // Set options
                  options: [
                      {

                          // Add title
                          title: {
                              text: 'Browser statistics',
                              subtext: 'Based on shared research',
                              x: 'center'
                          },

                          // Add tooltip
                          tooltip: {
                              trigger: 'item',
                              formatter: "{a} <br/>{b}: {c} ({d}%)"
                          },

                          // Add legend
                          legend: {
                              x: 'left',
                              orient: 'vertical',
                              data: ['Chrome','Firefox','Safari','IE9+','IE8-']
                          },

                          // Display toolbox
                          toolbox: {
                              show: true,
                              orient: 'vertical',
                              feature: {
                                  mark: {
                                      show: true,
                                      title: {
                                          mark: 'Markline switch',
                                          markUndo: 'Undo markline',
                                          markClear: 'Clear markline'
                                      }
                                  },
                                  dataView: {
                                      show: true,
                                      readOnly: false,
                                      title: 'View data',
                                      lang: ['View chart data', 'Close', 'Update']
                                  },
                                  magicType: {
                                      show: true,
                                      title: {
                                          pie: 'Switch to pies',
                                          funnel: 'Switch to funnel',
                                      },
                                      type: ['pie', 'funnel'],
                                      option: {
                                          funnel: {
                                              x: '25%',
                                              width: '50%',
                                              funnelAlign: 'left',
                                              max: 1700
                                          }
                                      }
                                  },
                                  restore: {
                                      show: true,
                                      title: 'Restore'
                                  },
                                  saveAsImage: {
                                      show: true,
                                      title: 'Same as image',
                                      lang: ['Save']
                                  }
                              }
                          },

                          // Add series
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              center: ['50%', '50%'],
                              radius: '60%',
                              data: [
                                  {value: idx * 128 + 80, name: 'Chrome'},
                                  {value: idx * 64 + 160, name: 'Firefox'},
                                  {value: idx * 32 + 320, name: 'Safari'},
                                  {value: idx * 16 + 640, name: 'IE9+'},
                                  {value: idx++ * 8 + 1280, name: 'IE8-'}
                              ]
                          }]
                      },

                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      },
                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      },
                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      },
                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      },
                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      },
                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      },
                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      },
                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      },
                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      },
                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      },
                      {
                          series: [{
                              name: 'Browser',
                              type: 'pie',
                              data: [
                                  {value: idx * 128 + 80,  name:'Chrome'},
                                  {value: idx * 64  + 160,  name:'Firefox'},
                                  {value: idx * 32  + 320,  name:'Safari'},
                                  {value: idx * 16  + 640,  name:'IE9+'},
                                  {value: idx++ * 8  + 1280, name:'IE8-'}
                              ]
                          }]
                      }
                  ]
              };


              //
              // Multiple donuts options
              //

              // Top text label
              var labelTop = {
                  normal: {
                      label: {
                          show: true,
                          position: 'center',
                          formatter: '{b}\n',
                          textStyle: {
                              baseline: 'middle',
                              fontWeight: 300,
                              fontSize: 15
                          }
                      },
                      labelLine: {
                          show: false
                      }
                  }
              };

              // Format bottom label
              var labelFromatter = {
                  normal: {
                      label: {
                          formatter: function (params) {
                              return '\n\n' + (100 - params.value) + '%'
                          }
                      }
                  }
              }

              // Bottom text label
              var labelBottom = {
                  normal: {
                      color: '#eee',
                      label: {
                          show: true,
                          position: 'center',
                          textStyle: {
                              baseline: 'middle'
                          }
                      },
                      labelLine: {
                          show: false
                      }
                  },
                  emphasis: {
                      color: 'rgba(0,0,0,0)'
                  }
              };

              // Set inner and outer radius
              var radius = [60, 75];

              // Add options
              multiple_donuts_options = {

                  // Add title
                  title: {
                      text: 'The Application World',
                      subtext: 'from global web index',
                      x: 'center'
                  },

                  // Add legend
                  legend: {
                      x: 'center',
                      y: '56%',
                      data: ['GoogleMaps', 'Facebook', 'Youtube', 'Google+', 'Weixin', 'Twitter', 'Skype', 'Messenger', 'Whatsapp', 'Instagram']
                  },

                  // Add series
                  series: [
                      {
                          type: 'pie',
                          center: ['10%', '32.5%'],
                          radius: radius,
                          itemStyle: labelFromatter,
                          data: [
                              {name: 'other', value: 46, itemStyle: labelBottom},
                              {name: 'GoogleMaps', value: 54,itemStyle: labelTop}
                          ]
                      },
                      {
                          type: 'pie',
                          center: ['30%', '32.5%'],
                          radius: radius,
                          itemStyle: labelFromatter,
                          data: [
                              {name: 'other', value: 56, itemStyle: labelBottom},
                              {name: 'Facebook', value: 44,itemStyle: labelTop}
                          ]
                      },
                      {
                          type: 'pie',
                          center: ['50%', '32.5%'],
                          radius: radius,
                          itemStyle: labelFromatter,
                          data: [
                              {name: 'other', value: 65, itemStyle: labelBottom},
                              {name: 'Youtube', value: 35,itemStyle: labelTop}
                          ]
                      },
                      {
                          type: 'pie',
                          center: ['70%', '32.5%'],
                          radius: radius,
                          itemStyle: labelFromatter,
                          data: [
                              {name: 'other', value: 70, itemStyle: labelBottom},
                              {name: 'Google+', value: 30,itemStyle: labelTop}
                          ]
                      },
                      {
                          type: 'pie',
                          center: ['90%', '32.5%'],
                          radius: radius,
                          itemStyle: labelFromatter,
                          data: [
                              {name:'other', value:73, itemStyle: labelBottom},
                              {name:'Weixin', value:27,itemStyle: labelTop}
                          ]
                      },
                      {
                          type: 'pie',
                          center: ['10%', '82.5%'],
                          radius: radius,
                          itemStyle: labelFromatter,
                          data: [
                              {name: 'other', value: 78, itemStyle: labelBottom},
                              {name: 'Twitter', value: 22,itemStyle: labelTop}
                          ]
                      },
                      {
                          type: 'pie',
                          center: ['30%', '82.5%'],
                          radius: radius,
                          itemStyle: labelFromatter,
                          data: [
                              {name: 'other', value: 78, itemStyle: labelBottom},
                              {name: 'Skype', value: 22,itemStyle: labelTop}
                          ]
                      },
                      {
                          type: 'pie',
                          center: ['50%', '82.5%'],
                          radius: radius,
                          itemStyle: labelFromatter,
                          data: [
                              {name: 'other', value: 78, itemStyle: labelBottom},
                              {name: 'Messenger', value: 22,itemStyle: labelTop}
                          ]
                      },
                      {
                          type: 'pie',
                          center: ['70%', '82.5%'],
                          radius: radius,
                          itemStyle: labelFromatter,
                          data: [
                              {name: 'other', value: 83, itemStyle: labelBottom},
                              {name: 'Whatsapp', value: 17,itemStyle: labelTop}
                          ]
                      },
                      {
                          type: 'pie',
                          center: ['90%', '82.5%'],
                          radius: radius,
                          itemStyle: labelFromatter,
                          data: [
                              {name:'other', value:89, itemStyle: labelBottom},
                              {name:'Instagram', value:11,itemStyle: labelTop}
                          ]
                      }
                  ]
              };



              // Apply options
              // ------------------------------

              basic_pie.setOption(basic_pie_options);
              basic_donut.setOption(basic_donut_options);
              nested_pie.setOption(nested_pie_options);
              infographic_donut.setOption(infographic_donut_options);
              rose_diagram_hidden.setOption(rose_diagram_hidden_options);
              rose_diagram_visible.setOption(rose_diagram_visible_options);
              lasagna_donut.setOption(lasagna_donut_options);
              pie_timeline.setOption(pie_timeline_options);
              multiple_donuts.setOption(multiple_donuts_options);



              // Resize charts
              // ------------------------------

              window.onresize = function () {
                  setTimeout(function (){
                      basic_pie.resize();
                      basic_donut.resize();
                      nested_pie.resize();
                      infographic_donut.resize();
                      rose_diagram_hidden.resize();
                      rose_diagram_visible.resize();
                      lasagna_donut.resize();
                      pie_timeline.resize();
                      multiple_donuts.resize();
                  }, 200);
              }
          }
      );
  });

  /* ------------------------------------------------------------------------------
   *
   *  # Echarts - timeline
   *
   *  Timeline chart addition
   *
   *  Version: 1.0
   *  Latest update: August 1, 2015
   *
   * ---------------------------------------------------------------------------- */

  var dataMap = {};
  function dataFormatter(obj) {
      var pList = ['Paris','Budapest','Prague','Madrid','Amsterdam','Berlin','Bratislava','Munich','Hague','Rome','Milan'];
      var temp;
      var max = 0;
      for (var year = 2010; year <= 2014; year++) {
          temp = obj[year];
          for (var i = 0, l = temp.length; i < l; i++) {
              max = Math.max(max, temp[i]);
              obj[year][i] = {
                  name : pList[i],
                  value : temp[i]
              }
          }
          obj[year+'max'] = Math.floor(max/100) * 100;
      }
      return obj;
  }

  function dataMix(list) {
      var mixData = {};
      for (var i = 0, l = list.length; i < l; i++) {
          for (var key in list[i]) {
              if (list[i][key] instanceof Array) {
                  mixData[key] = mixData[key] || [];
                  for (var j = 0, k = list[i][key].length; j < k; j++) {
                      mixData[key][j] = mixData[key][j] 
                                        || {name : list[i][key][j].name, value : []};
                      mixData[key][j].value.push(list[i][key][j].value);
                  }
              }
          }
      }
      return mixData;
  }

  dataMap.dataGDP = dataFormatter({
      2014:[16251.93,11307.28,24515.76,11237.55,14359.88,22226.7,10568.83,12582,19195.69,49110.27,32318.85],
      2013:[14113.58,9224.46,20394.26,9200.86,11672,18457.27,8667.58,10368.6,17165.98,41425.48,27722.31],
      2012:[12153.03,7521.85,17235.48,7358.31,9740.25,15212.49,7278.75,8587,15046.45,34457.3,22990.35],
      2011:[11115,6719.01,16011.97,7315.4,8496.2,13668.58,6426.1,8314.37,14069.87,30981.98],
      2010:[9846.81,5252.76,13607.32,6024.45,6423.18,11164.3,5284.69,7104,12494.01,26018.48,18753.73],
  });

  dataMap.dataPI = dataFormatter({
      2014:[136.27,159.72,2905.73,641.42,1306.3,1915.57,1277.44,1701.5,124.94,3064.78,1583.04],
      2013:[124.36,145.58,2562.81,554.48,1095.28,1631.08,1050.15,1302.9,114.15,2540.1,1360.56],
      2012:[118.29,128.85,2207.34,477.59,929.6,1414.9,980.57,1154.33,113.82,2261.86,1163.08],
      2011:[112.83,122.58,2034.59,313.58,907.95,1302.02,916.72,1088.94,111.8,2100.11,1095.96],
      2010:[101.26,110.19,1804.72,311.97,762.1,1133.42,783.8,915.38,101.84,1816.31,986.02],
  });

  dataMap.dataSI = dataFormatter({
      2014:[3752.48,5928.32,13126.86,6635.26,8037.69,12152.15,5611.48,5962.41,7927.89,25203.28,16555.58],
      2013:[3388.38,4840.23,10707.68,5234,6367.69,9976.82,4506.31,5025.15,7218.32,21753.93,14297.93],
      2012:[2855.55,3987.84,8959.83,3993.8,5114,7906.34,3541.92,4060.72,6001.78,18566.37,11908.49],
      2011:[2626.41,3709.78,8701.34,4242.36,4376.19,7158.84,3097.12,4319.75,6085.84,16993.34,11567.42],
      2010:[2509.4,2892.53,7201.88,3454.49,3193.67,5544.14,2475.45,3695.58,5571.06,14471.26,10154.25],
  });

  dataMap.dataTI = dataFormatter({
      2014:[12363.18,5219.24,8483.17,3960.87,5015.89,8158.98,3679.91,4918.09,11142.86,20842.21,14180.23],
      2013:[10600.84,4238.65,7123.77,3412.38,4209.03,6849.37,3111.12,4040.55,9833.51,17131.45,12063.82],
      2012:[9179.19,3405.16,6068.31,2886.92,3696.65,5891.25,2756.26,3371.95,8930.85,13629.07,9918.78],
      2011:[8375.76,2886.65,5276.04,2759.46,3212.06,5207.72,2412.26,2905.68,7872.23,11888.53,8799.31],
      2010:[7236.15,2250.04,4600.72,2257.99,2467.41,4486.74,2025.44,2493.04,6821.11,9730.91,7613.46],
  });

  dataMap.dataEstate = dataFormatter({
      2014:[1074.93,411.46,918.02,224.91,384.76,876.12,238.61,492.1,1019.68,2747.89,1677.13],
      2013:[1006.52,377.59,697.79,192,309.25,733.37,212.32,391.89,1002.5,2600.95,1618.17],
      2012:[1062.47,308.73,612.4,173.31,286.65,605.27,200.14,301.18,1237.56,2025.39,1316.84],
      2011:[844.59,227.88,513.81,166.04,273.3,500.81,182.7,244.47,939.34,1626.13,1052.03],
      2010:[821.5,183.44,467.97,134.12,191.01,410.43,153.03,225.81,958.06,1365.71,981.42],
  });

  dataMap.dataFinancial = dataFormatter({
      2014:[2215.41,756.5,746.01,519.32,447.46,755.57,207.65,370.78,2277.4,2600.11,2730.29],
      2013:[1863.61,572.99,615.42,448.3,346.44,639.27,190.12,304.59,1950.96,2105.92,2326.58],
      2012:[1603.63,461.2,525.67,361.64,291.1,560.2,180.83,227.54,1804.28,1596.98,1899.33],
      2011:[1519.19,368.1,420.74,290.91,219.09,455.07,147.24,177.43,1414.21,1298.48,1653.45],
      2010:[1302.77,288.17,347.65,218.73,148.3,386.34,126.03,155.48,1209.08,1054.25,1251.43],
  });

  dataMap.dataGDP_Estate = dataMix([dataMap.dataEstate, dataMap.dataGDP]);

  /* ------------------------------------------------------------------------------
   *
   *  # Echarts - columns and waterfalls
   *
   *  Columns and waterfalls chart configurations
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
          [
              'echarts',
              'echarts/theme/limitless',
              'echarts/chart/bar',
              'echarts/chart/line'
          ],


          // Charts setup
          function (ec, limitless) {


              // Initialize charts
              // ------------------------------

              var basic_columns = ec.init(document.getElementById('basic_columns'), limitless);
              /*var stacked_columns = ec.init(document.getElementById('stacked_columns'), limitless);
              var stacked_clustered_columns = ec.init(document.getElementById('stacked_clustered_columns'), limitless);
              var thermometer_columns = ec.init(document.getElementById('thermometer_columns'), limitless);
              var compositive_waterfall = ec.init(document.getElementById('compositive_waterfall'), limitless);
              var change_waterfall = ec.init(document.getElementById('change_waterfall'), limitless);*/
              var columns_timeline = ec.init(document.getElementById('columns_timeline'), limitless);



              // Charts setup
              // ------------------------------


              //
              // Basic columns options
              //

              basic_columns_options = {

                  // Setup grid
                  grid: {
                      x: 40,
                      x2: 40,
                      y: 35,
                      y2: 25
                  },

                  // Add tooltip
                  tooltip: {
                      trigger: 'axis'
                  },

                  // Add legend
                  legend: {
                      data: ['Evaporation', 'Precipitation']
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Horizontal axis
                  xAxis: [{
                      type: 'category',
                      data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                  }],

                  // Vertical axis
                  yAxis: [{
                      type: 'value'
                  }],

                  // Add series
                  series: [
                      {
                          name: 'Evaporation',
                          type: 'bar',
                          data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3],
                          itemStyle: {
                              normal: {
                                  label: {
                                      show: true,
                                      textStyle: {
                                          fontWeight: 500
                                      }
                                  }
                              }
                          },
                          markLine: {
                              data: [{type: 'average', name: 'Average'}]
                          }
                      },
                      {
                          name: 'Precipitation',
                          type: 'bar',
                          data: [2.6, 5.9, 9.0, 26.4, 58.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
                          itemStyle: {
                              normal: {
                                  label: {
                                      show: true,
                                      textStyle: {
                                          fontWeight: 500
                                      }
                                  }
                              }
                          },
                          markLine: {
                              data: [{type: 'average', name: 'Average'}]
                          }
                      }
                  ]
              };

              //
              // Timeline options
              //

              columns_timeline_options = {

                  // Setup timeline
                  timeline: {
                      data: ['2010-01-01', '2011-01-01', '2012-01-01', '2013-01-01', '2014-01-01'],
                      x: 10,
                      x2: 10,
                      label: {
                          formatter: function(s) {
                              return s.slice(0, 4);
                          }
                      },
                      autoPlay: true,
                      playInterval: 3000
                  },

                  // Main options
                  options: [
                      {

                          // Setup grid
                          grid: {
                              x: 55,
                              x2: 110,
                              y: 35,
                              y2: 100
                          },

                          // Add tooltip
                          tooltip: {
                              trigger: 'axis'
                          },

                          // Add legend
                          legend: {
                              data: ['GDP','Financial','Real Estate','Primary industry','Secondary industry','Third industry']
                          },

                          // Add toolbox
                          toolbox: {
                              show: true,
                              orient: 'vertical',
                              x: 'right', 
                              y: 70,
                              feature: {
                                  mark: {
                                      show: true,
                                      title: {
                                          mark: 'Markline switch',
                                          markUndo: 'Undo markline',
                                          markClear: 'Clear markline'
                                      }
                                  },
                                  dataView: {
                                      show: true,
                                      readOnly: false,
                                      title: 'View data',
                                      lang: ['View chart data', 'Close', 'Update']
                                  },
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
                                  saveAsImage: {
                                      show: true,
                                      title: 'Same as image',
                                      lang: ['Save']
                                  }
                              }
                          },

                          // Enable drag recalculate
                          calculable: true,

                          // Horizontal axis
                          xAxis: [{
                              type: 'category',
                              axisLabel: {
                                  interval: 0
                              },
                              data: ['Paris','Budapest','Prague','Madrid','Amsterdam','Berlin','Bratislava','Munich','Hague','Rome','Milan']
                          }],

                          // Vertical axis
                          yAxis: [
                              {
                                  type: 'value',
                                  name: 'GDP（million)',
                                  max: 53500
                              },
                              {
                                  type: 'value',
                                  name: 'Other（million)'
                              }
                          ],

                          // Add series
                          series: [
                              {
                                  name: 'GDP',
                                  type: 'bar',
                                  markLine: {
                                      symbol: ['arrow','none'],
                                      symbolSize: [4, 2],
                                      itemStyle: {
                                          normal: {
                                              lineStyle: {color: 'orange'},
                                              barBorderColor: 'orange',
                                              label: {
                                                  position: 'left',
                                                  formatter: function(params) {
                                                      return Math.round(params.value);
                                                  },
                                                  textStyle: {color: 'orange'}
                                              }
                                          }
                                      },
                                      data: [{type: 'average', name: 'Average'}]
                                  },
                                  data: dataMap.dataGDP['2010']
                              },
                              {
                                  name: 'Financial',
                                  yAxisIndex: 1,
                                  type: 'bar',
                                  data: dataMap.dataFinancial['2010']
                              },
                              {
                                  name: 'Real Estate',
                                  yAxisIndex: 1,
                                  type: 'bar',
                                  data: dataMap.dataEstate['2010']
                              },
                              {
                                  name: 'Primary industry',
                                  yAxisIndex: 1,
                                  type: 'bar',
                                  data: dataMap.dataPI['2010']
                              },
                              {
                                  name: 'Secondary industry',
                                  yAxisIndex: 1,
                                  type: 'bar',
                                  data: dataMap.dataSI['2010']
                              },
                              {
                                  name: 'Third industry',
                                  yAxisIndex: 1,
                                  type: 'bar',
                                  data: dataMap.dataTI['2010']
                              }
                          ]
                      },

                      // 2011 data
                      {
                          series: [
                              {data: dataMap.dataGDP['2011']},
                              {data: dataMap.dataFinancial['2011']},
                              {data: dataMap.dataEstate['2011']},
                              {data: dataMap.dataPI['2011']},
                              {data: dataMap.dataSI['2011']},
                              {data: dataMap.dataTI['2011']}
                          ]
                      },

                      // 2012 data
                      {
                          series: [
                              {data: dataMap.dataGDP['2012']},
                              {data: dataMap.dataFinancial['2012']},
                              {data: dataMap.dataEstate['2012']},
                              {data: dataMap.dataPI['2012']},
                              {data: dataMap.dataSI['2012']},
                              {data: dataMap.dataTI['2012']}
                          ]
                      },

                      // 2013 data
                      {
                          series: [
                              {data: dataMap.dataGDP['2013']},
                              {data: dataMap.dataFinancial['2013']},
                              {data: dataMap.dataEstate['2013']},
                              {data: dataMap.dataPI['2013']},
                              {data: dataMap.dataSI['2013']},
                              {data: dataMap.dataTI['2013']}
                          ]
                      },

                      // 2014 data
                      {
                          series: [
                              {data: dataMap.dataGDP['2014']},
                              {data: dataMap.dataFinancial['2014']},
                              {data: dataMap.dataEstate['2014']},
                              {data: dataMap.dataPI['2014']},
                              {data: dataMap.dataSI['2014']},
                              {data: dataMap.dataTI['2014']}
                          ]
                      }
                  ]
              };



              // Apply options
              // ------------------------------

              basic_columns.setOption(basic_columns_options);
              //stacked_columns.setOption(stacked_columns_options);
              //stacked_clustered_columns.setOption(stacked_clustered_columns_options);
              //thermometer_columns.setOption(thermometer_columns_options);
              //compositive_waterfall.setOption(compositive_waterfall_options);
              //change_waterfall.setOption(change_waterfall_options);
              columns_timeline.setOption(columns_timeline_options);



              // Resize charts
              // ------------------------------

              window.onresize = function () {
                  setTimeout(function () {
                      basic_columns.resize();
                      stacked_columns.resize();
                      stacked_clustered_columns.resize();
                      thermometer_columns.resize();
                      compositive_waterfall.resize();
                      change_waterfall.resize();
                      columns_timeline.resize();
                  }, 200);
              }
          }
      );
  });

  /* ------------------------------------------------------------------------------
   *
   *  # Echarts - bars and tornados
   *
   *  Bars and tornados chart configurations
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
          [
              'echarts',
              'echarts/theme/limitless',
              'echarts/chart/bar',
              'echarts/chart/line'
          ],


          // Charts setup
          function (ec, limitless) {


              // Initialize charts
              // ------------------------------
              var stacked_bars = ec.init(document.getElementById('stacked_bars'), limitless);
              var tornado_bars_negative = ec.init(document.getElementById('tornado_bars_negative'), limitless);

              /*var basic_bars = ec.init(document.getElementById('basic_bars'), limitless);
              var stacked_clustered_bars = ec.init(document.getElementById('stacked_clustered_bars'), limitless);
              var floating_bars = ec.init(document.getElementById('floating_bars'), limitless);
              var irregular_bars = ec.init(document.getElementById('irregular_bars'), limitless);
              var tornado_bars_staggered = ec.init(document.getElementById('tornado_bars_staggered'), limitless);*/



              // Charts setup
              // ------------------------------

              //
              // Stacked bars options
              //

              stacked_bars_options = {

                  // Setup grid
                  grid: {
                      x: 75,
                      x2: 25,
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
                      data:['Internet Explorer','Opera','Safari','Firefox','Chrome']
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Horizontal axis
                  xAxis: [{
                      type: 'value'
                  }],

                  // Vertical axis
                  yAxis: [{
                      type: 'category',
                      data: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
                  }],

                  // Add series
                  series: [
                      {
                          name: 'Internet Explorer',
                          type: 'bar',
                          stack: 'Total',
                          itemStyle: {
                              normal: {
                                  color: '#42A5F5',
                                  label: {
                                      show: true,
                                      position: 'insideRight'
                                  }
                              },
                              emphasis: {
                                  color: '#42A5F5',
                                  label: {
                                      show: true
                                  }
                              }
                          },
                          data:[320, 302, 301, 334, 390, 330, 320]
                      },
                      {
                          name: 'Opera',
                          type: 'bar',
                          stack: 'Total',
                          itemStyle: {
                              normal: {
                                  color: '#ef5350',
                                  label: {
                                      show: true,
                                      position: 'insideRight'
                                  }
                              },
                              emphasis: {
                                  color: '#ef5350',
                                  label: {
                                      show: true
                                  }
                              }
                          },
                          data:[120, 132, 101, 134, 90, 230, 210]
                      },
                      {
                          name: 'Safari',
                          type: 'bar',
                          stack: 'Total',
                          itemStyle: {
                              normal: {
                                  color: '#66bb6a',
                                  label: {
                                      show: true,
                                      position: 'insideRight'
                                  }
                              },
                              emphasis: {
                                  color: '#66bb6a',
                                  label: {
                                      show: true
                                  }
                              }
                          },
                          data:[220, 182, 191, 234, 290, 330, 310]
                      },
                      {
                          name: 'Firefox',
                          type: 'bar',
                          stack: 'Total',
                          itemStyle: {
                              normal: {
                                  color: '#ff7043',
                                  label: {
                                      show: true,
                                      position: 'insideRight'
                                  }
                              },
                              emphasis: {
                                  color: '#ff7043',
                                  label: {
                                      show: true
                                  }
                              }
                          },
                          data:[150, 212, 201, 154, 190, 330, 410]
                      },
                      {
                          name: 'Chrome',
                          type: 'bar',
                          stack: 'Total',
                          itemStyle: {
                              normal: {
                                  color: '#26a69a',
                                  label: {
                                      show: true,
                                      position: 'insideRight'
                                  }
                              },
                              emphasis: {
                                  color: '#26a69a',
                                  label: {
                                      show: true
                                  }
                              }
                          },
                          data:[820, 832, 901, 934, 1290, 1330, 1320]
                      }
                  ]
              };

              //
              // Tornado with negative stacks options
              //

              tornado_bars_negative_options = {

                  // Setup grid
                  grid: {
                      x: 75,
                      x2: 25,
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
                      data: ['Profit', 'Expenses', 'Income']
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Horizontal axis
                  xAxis: [{
                      type: 'value'
                  }],

                  // Vertical axis
                  yAxis: [{
                      type: 'category',
                      axisTick: {
                          show: false
                      },
                      data: ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']
                  }],

                  // Add series
                  series: [
                      {
                          name: 'Profit',
                          type: 'bar',
                          itemStyle: {
                              normal: {
                                  label: {
                                      show: true,
                                      position: 'inside'
                                  }
                              }
                          },
                          data: [200, 170, 240, 244, 200, 220, 210]
                      },
                      {
                          name: 'Income',
                          type: 'bar',
                          stack: 'Total',
                          barWidth: 5,
                          itemStyle: {
                              normal: {
                                  label: {
                                      show: true
                                  }
                              }
                          },
                          data: [320, 302, 341, 374, 390, 450, 420]
                      },
                      {
                          name: 'Expenses',
                          type: 'bar',
                          stack: 'Total',
                          itemStyle: {
                              normal: {
                                  label: {
                                      show: true,
                                      position: 'left'
                                  }
                              }
                          },
                          data: [-120, -132, -101, -134, -190, -230, -210]
                      }
                  ]
              };


              // Apply options
              // ------------------------------
              stacked_bars.setOption(stacked_bars_options);
              tornado_bars_negative.setOption(tornado_bars_negative_options);

              /*basic_bars.setOption(basic_bars_options);
              stacked_clustered_bars.setOption(stacked_clustered_bars_options);
              floating_bars.setOption(floating_bars_options);
              irregular_bars.setOption(irregular_bars_options);
              tornado_bars_staggered.setOption(tornado_bars_staggered_options);*/



              // Resize charts
              // ------------------------------

              window.onresize = function () {
                  setTimeout(function (){
                      stacked_bars.resize();
                      tornado_bars_negative.resize();

                      /*basic_bars.resize();
                      stacked_clustered_bars.resize();
                      floating_bars.resize();
                      irregular_bars.resize();
                      tornado_bars_staggered.resize();*/
                  }, 200);
              }
          }
      );
  });
  


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

              var line_bar = ec.init(document.getElementById('line_bar'), limitless);
              var connect_pie = ec.init(document.getElementById('connect_pie'), limitless);
              var connect_column = ec.init(document.getElementById('connect_column'), limitless);




              // Charts options
              // ------------------------------


              //
              // Line and bar combination
              //

              line_bar_options = {

                  // Setup grid
                  grid: {
                      x: 55,
                      x2: 45,
                      y: 35,
                      y2: 25
                  },

                  // Add tooltip
                  tooltip: {
                      trigger: 'axis'
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Add legend
                  legend: {
                      data: ['Evaporation','Precipitation','Temperature']
                  },

                  // Horizontal axis
                  xAxis: [{
                      type: 'category',
                      data: ['January','February','March','April','May','June','July','August','September','October','November','December']
                  }],

                  // Vertical axis
                  yAxis: [
                      {
                          type: 'value',
                          name: 'Water',
                          axisLabel: {
                              formatter: '{value} ml'
                          }
                      },
                      {
                          type: 'value',
                          name: 'Temp',
                          axisLabel: {
                              formatter: '{value} °C'
                          }
                      }
                  ],

                  // Add series
                  series: [
                      {
                          name: 'Evaporation',
                          type: 'bar',
                          data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
                      },
                      {
                          name: 'Precipitation',
                          type: 'bar',
                          data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
                      },
                      {
                          name: 'Temperature',
                          type: 'line',
                          yAxisIndex: 1,
                          data: [2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
                      }
                  ]
              };

              //
              // Column and pie connection
              //

              // Pie options
              connect_pie_options = {

                  // Add title
                  title: {
                      text: 'Browser popularity',
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
                      data: ['Internet Explorer','Opera','Safari','Firefox','Chrome']
                  },

                  // Enable drag recalculate
                  calculable: true,

                  // Add series
                  series: [{
                      name: 'Browser',
                      type: 'pie',
                      radius: '75%',
                      center: ['50%', '57.5%'],
                      data: [
                          {value: 335, name: 'Internet Explorer'},
                          {value: 310, name: 'Opera'},
                          {value: 234, name: 'Safari'},
                          {value: 135, name: 'Firefox'},
                          {value: 1548, name: 'Chrome'}
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
                      data: ['Internet Explorer','Opera','Safari','Firefox','Chrome']
                  },

                  // Add toolbox
                  toolbox: {
                      show: true,
                      orient: 'vertical',
                      x: 'right', 
                      y: 35,
                      feature: {
                          mark: {
                              show: true,
                              title: {
                                  mark: 'Markline switch',
                                  markUndo: 'Undo markline',
                                  markClear: 'Clear markline'
                              }
                          },
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
                          saveAsImage: {
                              show: true,
                              title: 'Same as image',
                              lang: ['Save']
                          }
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



              //
              // Dynamic data (scatter and candlestick combination)
              //

              candlestick_scatter_options = {

                  // Setup grid
                  grid: {
                      x: 45,
                      x2: 45,
                      y: 60,
                      y2: 90
                  },

                  // Add tooltip
                  tooltip: {
                      trigger: 'axis'
                  },

                  // Add legend
                  legend: {
                      data:['Composite index', 'Turnover (million)']
                  },

                  // Display data zoom
                  dataZoom: {
                      show: true,
                      realtime: true,
                      start: 50,
                      end: 100,
                      height: 40
                  },

                  // Horizontal axis
                  xAxis: [
                      {
                          type: 'category',
                          boundaryGap: true,
                          data: [
                              "2013/1/24", "2013/1/25", "2013/1/28", "2013/1/29", "2013/1/30",
                              "2013/1/31", "2013/2/1", "2013/2/4", "2013/2/5", "2013/2/6", 
                              "2013/2/7", "2013/2/8", "2013/2/18", "2013/2/19", "2013/2/20", 
                              "2013/2/21", "2013/2/22", "2013/2/25", "2013/2/26", "2013/2/27", 
                              "2013/2/28", "2013/3/1", "2013/3/4", "2013/3/5", "2013/3/6", 
                              "2013/3/7", "2013/3/8", "2013/3/11", "2013/3/12", "2013/3/13", 
                              "2013/3/14", "2013/3/15", "2013/3/18", "2013/3/19", "2013/3/20", 
                              "2013/3/21", "2013/3/22", "2013/3/25", "2013/3/26", "2013/3/27", 
                              "2013/3/28", "2013/3/29", "2013/4/1", "2013/4/2", "2013/4/3", 
                              "2013/4/8", "2013/4/9", "2013/4/10", "2013/4/11", "2013/4/12", 
                              "2013/4/15", "2013/4/16", "2013/4/17", "2013/4/18", "2013/4/19", 
                              "2013/4/22", "2013/4/23", "2013/4/24", "2013/4/25", "2013/4/26", 
                              "2013/5/2", "2013/5/3", "2013/5/6", "2013/5/7", "2013/5/8", 
                              "2013/5/9", "2013/5/10", "2013/5/13", "2013/5/14", "2013/5/15", 
                              "2013/5/16", "2013/5/17", "2013/5/20", "2013/5/21", "2013/5/22", 
                              "2013/5/23", "2013/5/24", "2013/5/27", "2013/5/28", "2013/5/29", 
                              "2013/5/30", "2013/5/31", "2013/6/3", "2013/6/4", "2013/6/5", 
                              "2013/6/6", "2013/6/7", "2013/6/13"
                          ]
                      },
                      {
                          type: 'value',
                          max: 100,
                          scale: true
                      }
                  ],

                  // Vertical axis
                  yAxis: [
                      {
                          type: 'value',
                          scale: true,
                          splitNumber: 5,
                          boundaryGap: [0.05, 0.05]
                      },
                      {
                          type: 'value',
                          splitNumber: 5,
                          scale: true
                      }
                  ],

                  // Add series
                  series: [
                      {
                          name: 'Composite index',
                          type: 'k',
                          data: [
                              [2320.26,2302.6,2287.3,2362.94],
                              [2300,2291.3,2288.26,2308.38],
                              [2295.35,2346.5,2295.35,2346.92],
                              [2347.22,2358.98,2337.35,2363.8],
                              [2360.75,2382.48,2347.89,2383.76],
                              [2383.43,2385.42,2371.23,2391.82],
                              [2377.41,2419.02,2369.57,2421.15],
                              [2425.92,2428.15,2417.58,2440.38],
                              [2411,2433.13,2403.3,2437.42],
                              [2432.68,2434.48,2427.7,2441.73],
                              [2430.69,2418.53,2394.22,2433.89],
                              [2416.62,2432.4,2414.4,2443.03],
                              [2441.91,2421.56,2415.43,2444.8],
                              [2420.26,2382.91,2373.53,2427.07],
                              [2383.49,2397.18,2370.61,2397.94],
                              [2378.82,2325.95,2309.17,2378.82],
                              [2322.94,2314.16,2308.76,2330.88],
                              [2320.62,2325.82,2315.01,2338.78],
                              [2313.74,2293.34,2289.89,2340.71],
                              [2297.77,2313.22,2292.03,2324.63],
                              [2322.32,2365.59,2308.92,2366.16],
                              [2364.54,2359.51,2330.86,2369.65],
                              [2332.08,2273.4,2259.25,2333.54],
                              [2274.81,2326.31,2270.1,2328.14],
                              [2333.61,2347.18,2321.6,2351.44],
                              [2340.44,2324.29,2304.27,2352.02],
                              [2326.42,2318.61,2314.59,2333.67],
                              [2314.68,2310.59,2296.58,2320.96],
                              [2309.16,2286.6,2264.83,2333.29],
                              [2282.17,2263.97,2253.25,2286.33],
                              [2255.77,2270.28,2253.31,2276.22],
                              [2269.31,2278.4,2250,2312.08],
                              [2267.29,2240.02,2239.21,2276.05],
                              [2244.26,2257.43,2232.02,2261.31],
                              [2257.74,2317.37,2257.42,2317.86],
                              [2318.21,2324.24,2311.6,2330.81],
                              [2321.4,2328.28,2314.97,2332],
                              [2334.74,2326.72,2319.91,2344.89],
                              [2318.58,2297.67,2281.12,2319.99],
                              [2299.38,2301.26,2289,2323.48],
                              [2273.55,2236.3,2232.91,2273.55],
                              [2238.49,2236.62,2228.81,2246.87],
                              [2229.46,2234.4,2227.31,2243.95],
                              [2234.9,2227.74,2220.44,2253.42],
                              [2232.69,2225.29,2217.25,2241.34],
                              [2196.24,2211.59,2180.67,2212.59],
                              [2215.47,2225.77,2215.47,2234.73],
                              [2224.93,2226.13,2212.56,2233.04],
                              [2236.98,2219.55,2217.26,2242.48],
                              [2218.09,2206.78,2204.44,2226.26],
                              [2199.91,2181.94,2177.39,2204.99],
                              [2169.63,2194.85,2165.78,2196.43],
                              [2195.03,2193.8,2178.47,2197.51],
                              [2181.82,2197.6,2175.44,2206.03],
                              [2201.12,2244.64,2200.58,2250.11],
                              [2236.4,2242.17,2232.26,2245.12],
                              [2242.62,2184.54,2182.81,2242.62],
                              [2187.35,2218.32,2184.11,2226.12],
                              [2213.19,2199.31,2191.85,2224.63],
                              [2203.89,2177.91,2173.86,2210.58],
                              [2170.78,2174.12,2161.14,2179.65],
                              [2179.05,2205.5,2179.05,2222.81],
                              [2212.5,2231.17,2212.5,2236.07],
                              [2227.86,2235.57,2219.44,2240.26],
                              [2242.39,2246.3,2235.42,2255.21],
                              [2246.96,2232.97,2221.38,2247.86],
                              [2228.82,2246.83,2225.81,2247.67],
                              [2247.68,2241.92,2231.36,2250.85],
                              [2238.9,2217.01,2205.87,2239.93],
                              [2217.09,2224.8,2213.58,2225.19],
                              [2221.34,2251.81,2210.77,2252.87],
                              [2249.81,2282.87,2248.41,2288.09],
                              [2286.33,2299.99,2281.9,2309.39],
                              [2297.11,2305.11,2290.12,2305.3],
                              [2303.75,2302.4,2292.43,2314.18],
                              [2293.81,2275.67,2274.1,2304.95],
                              [2281.45,2288.53,2270.25,2292.59],
                              [2286.66,2293.08,2283.94,2301.7],
                              [2293.4,2321.32,2281.47,2322.1],
                              [2323.54,2324.02,2321.17,2334.33],
                              [2316.25,2317.75,2310.49,2325.72],
                              [2320.74,2300.59,2299.37,2325.53],
                              [2300.21,2299.25,2294.11,2313.43],
                              [2297.1,2272.42,2264.76,2297.1],
                              [2270.71,2270.93,2260.87,2276.86],
                              [2264.43,2242.11,2240.07,2266.69],
                              [2242.26,2210.9,2205.07,2250.63],
                              [2190.1,2148.35,2126.22,2190.1]
                          ]
                      },
                      {
                          name: 'Turnover (million)',
                          type: 'scatter',
                          xAxisIndex: 1,
                          yAxisIndex: 1,
                          symbolSize: function (value) {
                              return Math.round(value[2] / 4);
                          },
                          data: (function () {
                              var d = [];
                              var len = 100;
                              while (len--) {
                                  d.push([
                                      (Math.random()*100).toFixed(2) - 0,
                                      (Math.random()*100).toFixed(2) - 0,
                                      (Math.random()*100).toFixed(2) - 0
                                  ]);
                              }
                              return d;
                          })()
                      }
                  ]
              };

              // Apply options
              // ------------------------------

              line_bar.setOption(line_bar_options);
              connect_pie.setOption(connect_pie_options);
              connect_column.setOption(connect_column_options);



              // Resize charts
              // ------------------------------

              window.onresize = function () {
                  setTimeout(function (){
                      line_bar.resize();
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
 *  # Google Visualization - 3D pie
 *
 *  Google Visualization 3D pie chart demonstration
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */


// 3D pie chart
// ------------------------------

// Initialize chart
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawPie3d);


// Chart settings
function drawPie3d() {

    // Data
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work',     11],
        ['Eat',      2],
        ['Commute',  2],
        ['Watch TV', 2],
        ['Sleep',    7]
    ]);


    // Options
    var options_pie_3d = {
        fontName: 'Roboto',
        is3D: true,
        height: 300,
        width: 540,
        chartArea: {
            left: 50,
            width: '95%',
            height: '95%'
        }
    };


    // Instantiate and draw our chart, passing in some options.
    var pie_3d = new google.visualization.PieChart($('#google-pie-3d')[0]);
    pie_3d.draw(data, options_pie_3d);
}

  /* ------------------------------------------------------------------------------
 *
 *  # Google Visualization - sliced 3D donut
 *
 *  Google Visualization sliced 3D donut chart demonstration
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */


// Sliced 3D donut chart
// ------------------------------

// Initialize chart
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawExploded3d);


// Chart settings
function drawExploded3d() {

    // Data
    var data = google.visualization.arrayToDataTable([
        ['Language', 'Speakers (in millions)'],
        ['Assamese', 13],
        ['Bengali', 83],
        ['Gujarati', 46],
        ['Hindi', 90],
        ['Kannada', 38],
        ['Maithili', 20],
        ['Malayalam', 33],
        ['Marathi', 72],
        ['Oriya', 33],
        ['Punjabi', 29],
        ['Tamil', 61],
        ['Telugu', 74],
        ['Urdu', 52]
    ]);


    // Options
    var options = {
        fontName: 'Roboto',
        height: 300,
        width: 540,
        chartArea: {
            left: 50,
            width: '95%',
            height: '95%'
        },
        is3D: true,
        pieSliceText: 'label',
        slices: {  
            2: {offset: 0.15},
            8: {offset: 0.1},
            10: {offset: 0.15},
            11: {offset: 0.1}
        }
    };


    // Instantiate and draw our chart, passing in some options.
    var pie_3d_exploded = new google.visualization.PieChart($('#google-3d-exploded')[0]);
    pie_3d_exploded.draw(data, options);
}



</script>