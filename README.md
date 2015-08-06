# hx-core library

A PHP library inspired from onion architecture to solve:
- decouple from 3rd party library but able to coorperate with it. (via adaptor design pattern)
- more persistent when encouter technology change (example, from REST API to Xml-Rpc API)
- compliance with SOLID design pattern
  - highly reusable component (less reinvent wheels, and able to develop specialize component library)
  - expandable component class
  - adapt to change upon requirement less likely to break source code (by repalcing different implementation class/component)
- Separate of concern: domain problem, persistent layer, and delivery machanism is less dependent on each other
- Unit testable source code

This library mainly focus on building backend web server. 
It is possible to build full fledge web server with this library, however it is highly recommend build separate front end web server via other libraries such as AngularJS, React and Backbone.js.
