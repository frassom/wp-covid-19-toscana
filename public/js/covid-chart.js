(function($) {
	'use strict';
	
	$(document).ready(function() {
		
		// Settings for chart.js looks
		
		var charts = [];
		
		var chartOptions = {
			tooltips: {
				intersect: false,
				position: 'custom',
				mode: 'label',
				itemSort: function(x, y) {
					if (x.yLabel < y.yLabel) {
						return 1;
					} else if (x.yLabel > y.yLabel) {
						return -1;
					} else {
						return 0;
					}
				},
			},
			elements: {
				line: {
					tension: 0,
				}
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
					}
				}],
				xAxes: [{
					ticks: {
						maxRotation: 90,
						minRotation: 90,
					}
				}]
			},
			layout: {
				padding: {
					bottom: 5,
				}
			}
		};
		
		Chart.Tooltip.positioners.custom = function(elements, position) {
			return {
				x: this._chart.tooltip._active[0].tooltipPosition().x,
				y: Math.min(this._chart.chartArea.bottom, Math.max(this._chart.chartArea.top, position.y)),
			}
		}
		
		Chart.defaults.LineWithLine = Chart.defaults.line;
		Chart.controllers.LineWithLine = Chart.controllers.line.extend({
			update: function(t) {
				Chart.controllers.line.prototype.update.call(this, t);
				
				var visibleIndex = -1;
				this.chart.legend.legendItems.forEach(function(item, index) {
					if (visibleIndex == -1 && item.hidden == false) {
						visibleIndex = index;
					}
				});

				this._firstVisibleItemIndex = visibleIndex;
			},
			draw: function(ease) {
				Chart.controllers.line.prototype.draw.call(this, ease);
				
				if (this.chart.tooltip._active && this.chart.tooltip._active.length) {
					if (this.index == this._firstVisibleItemIndex) {
						var ctx = this.chart.ctx;
						var x = this.chart.tooltip._active[0].tooltipPosition().x;
						var topY = this.chart.legend.bottom;
						var bottomY = this.chart.chartArea.bottom;
						
						// draw line
						ctx.save();
						ctx.beginPath();
						ctx.moveTo(x, topY);
						ctx.lineTo(x, bottomY);
						ctx.lineWidth = 2;
						ctx.strokeStyle = '#3333';
						ctx.stroke();
						ctx.restore();
					}
				}
			}
		});
		
		Chart.defaults.BarWithLine = Chart.defaults.bar;
		Chart.defaults.global.datasets.BarWithLine = Chart.defaults.global.datasets.bar;
		Chart.controllers.BarWithLine = Chart.controllers.bar.extend({
			update: function(t) {
				Chart.controllers.bar.prototype.update.call(this, t);
				
				var visibleIndex = -1;
				this.chart.legend.legendItems.forEach(function(item, index) {
					if (visibleIndex == -1 && item.hidden == false) {
						visibleIndex = index;
					}
				});

				this._firstVisibleItemIndex = visibleIndex;
			},
			draw: function(ease) {
				Chart.controllers.bar.prototype.draw.call(this, ease);
				
				if (this.chart.tooltip._active && this.chart.tooltip._active.length) {
					if (this.index == this._firstVisibleItemIndex) {
						var ctx = this.chart.ctx;
						var x = this.chart.tooltip._active[0].tooltipPosition().x;
						var topY = this.chart.legend.bottom;
						var bottomY = this.chart.chartArea.bottom;
						
						// draw line
						ctx.save();
						ctx.beginPath();
						ctx.moveTo(x, topY);
						ctx.lineTo(x, bottomY);
						ctx.lineWidth = 2;
						ctx.strokeStyle = '#3333';
						ctx.stroke();
						ctx.restore();
					}
				}
			}
		});
		

		// Make Ajax request and populate charts

		var ajaxUrl = covidAjaxObj.ajaxUrl;

		var ajaxData = 	{
			_ajax_nonce: covidAjaxObj.nonce,
			action: 'covid_dataset',
		};
		
		$.post(ajaxUrl, ajaxData, function(result) {
			$('div.covid-visual-loading').remove();
			
			$('canvas.grafico-toscana').each(function() {
				var attributes = $(this).data('dati').split(',').map(function(s) { return s.trim(); });
				
				var chartData = {
					labels: result.date,
					datasets: [],
				};
				
				attributes.forEach(function(item) {
					if (typeof result.Toscana[item] === 'undefined') {
						console.error('attributo "' + item + '"non valido in grafico-toscana');
					} else {
						chartData.datasets.push({
							label: result.options[item].label,
							data: result.Toscana[item],
							borderColor: result.options[item].color,
							backgroundColor: result.options[item].color,
							fill: false,
							pointRadius: 0,
							pointHoverRadius: 0,
							type: result.options[item].type,
						});
					}
				});
				
				charts.push(new Chart(this, {type: 'LineWithLine', data: chartData, options: chartOptions}));
			});
			
			$('canvas.grafico-provincia').each(function() {
				var provence = $(this).data('provincia').trim();
				var attributes = $(this).data('dati').split(',').map(function (s) { return s.trim(); });
				
				var chartData = {
					labels: result.date,
					datasets: [],
				};
				
				attributes.forEach(function(item) {
					if (typeof result[provence] === 'undefined') {
						console.error('provincia "' + provence + '" non valida in grafico-provincia');
					} else if (typeof result[provence][item] === 'undefined') {
						console.error('dato "' + item + '" non valido in grafico-provincia');
					} else {
						chartData.datasets.push({
							label: result.options[item].label,
							data: result[provence][item],
							borderColor: result.options[item].color,
							backgroundColor: result.options[item].color,
							fill: false,
							pointRadius: 0,
							pointHoverRadius: 0,
							type: result.options[item].type,
						});
					}
				});
				
				charts.push(new Chart(this, {type: 'LineWithLine', data: chartData, options: chartOptions}));
			});
			
			$('canvas.grafico-confronto-province').each(function() {
				var provences = $(this).data('province').split(',').map(function(s) { return s.trim(); });
				var attribute = $(this).data('dato').trim();
				
				var chartData = {
					labels: result.date,
					datasets: []
				};
				
				provences.forEach(function(provence) {
					if (typeof result[provence] === 'undefined') {
						console.error('provincia "' + provence + '" non valida in grafico-confronto-province');
					} else if (typeof result[provence][attribute] === 'undefined') {
						console.error('dato "' + attribute + '" non valido in grafico-confronto-province');
					} else {
						chartData.datasets.push({
							label: provence,
							data: result[provence][attribute],
							borderColor: result[provence].color,
							backgroundColor: result[provence].color,
							fill: false,
							pointRadius: 0,
							pointHoverRadius: 0,
						});
					}
				});
				
				charts.push(new Chart(this, {type: 'LineWithLine', data: chartData, options: chartOptions}));
			});
		}).fail(function(r) { console.error(r); });
	});
	
})(jQuery);
