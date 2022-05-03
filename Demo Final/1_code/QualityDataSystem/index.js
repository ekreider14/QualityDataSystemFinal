const margin = { left: 120, right: 30, top: 60, bottom: 30 };

const width = document.querySelector("body").clientWidth,
  height = 500;

const svg = d3.select("svg").attr("viewBox", [0, 0, width, height]);

const x_scale = d3.scaleTime().range([margin.left, width - margin.right]);
const y_scale = d3.scaleLinear().range([height - margin.bottom - margin.top, margin.top]);

// labels
const x_label = "Time";
const y_label = "Value";

// add title
svg
  .append("text")
  .attr("class", "svg_title")
  .attr("x", (width - margin.right + margin.left) / 2)
  .attr("y", margin.top / 2)
  .attr("text-anchor", "middle")
  .style("font-size", "22px")
  .text(`Trend Data`);
// add y label
svg
  .append("text")
  .attr("text-ancho", "middle")
  .attr(
    "transform",
    `translate(${margin.left - 70}, ${
      (height - margin.top - margin.bottom + 180) / 2
    }) rotate(-90)`
  )
  .style("font-size", "26px")
  .text(y_label);
// add x label
svg
  .append("text")
  .attr("class", "svg_title")
  .attr("x", (width - margin.right + margin.left) / 2)
  .attr("y", height - margin.bottom - margin.top + 60)
  .attr("text-anchor", "middle")
  .style("font-size", "26px")
  .text(x_label);

const dateTime = (d) => new Date(d.dateTime);
const temperature = (d) => +d.values.temperature;

const line_generator = d3.line()
  .x((d) => x_scale(dateTime(d)))
  .y((d) => y_scale(temperature(d)))
  .curve(d3.curveBasis);

  d3.json("http://localhost/qualitydatasystem/d3connectionjson.php").then(data => {
    console.log(data);
    data.map(d => console.log(d));
});

d3.json("http://localhost/qualitydatasystem/d3connectionjson.php").then(({ data }) => {
  const d = data;
  
// set the domain 
  x_scale.domain(d3.extent(d, dateTime)).nice(ticks);
  y_scale.domain(d3.extent(d, temperature)).nice(ticks);
  // add the line path
  svg
    .append("path")
    .attr("fill", "none")
    .attr("stroke", "steelblue")
    .attr("stroke-width", 4)
    .attr("d", line_generator(d)); // generate the path
});