import React from 'react';
import ReactDOM from 'react-dom';
import CssBaseline from '@material-ui/core/CssBaseline';
import ButtonAppBar from './ButtonAppBar';

function Index() {
  return (
    <React.Fragment>
      <CssBaseline />
      <ButtonAppBar />
    </React.Fragment>
  );
}

export default Index;

ReactDOM.render(<Index />, document.getElementById('app'));
