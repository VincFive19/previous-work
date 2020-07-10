import React from 'react';
import ReactDOM from 'react-dom';

//React.js componant props
function Channels(props) {
 const channel = props.channel;
 const listItems = channel.map((channel, key) =>
  <div key={channel.id} id="clickChannel" channelid={channel.channelId}  name="thumb" className="channels" >
   <div>
    <h1 className="paragraph-margin">{channel.title}</h1>
    <p className="paragraph-margin">{channel.description}</p>
    <p className="paragraph-margin" id="channelId">{channel.channelId}</p>
    <form action={channel.channelLink} method="get" target="_blank">
     <button id="buttonLinkToChannel" type="submit" >Link to Channel</button>
    </form>
   </div>
  </div>
 );
 return (
  <div className="flexbox-channel" >
   {listItems}
  </div>
 );
}


//Display channels, uses promise to wait for all channelsdata
export function channelDisplay(channelsData) {
 ReactDOM.unmountComponentAtNode(document.getElementById('container'));
 Promise.all(channelsData).then(function(values) {

  console.log("banana");
  ReactDOM.render(
   <Channels channel={channelsData} />,
   document.getElementById('container')
  );
 });
}
