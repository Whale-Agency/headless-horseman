import classnames from 'classnames';

const {__} = wp.i18n;
const {createHigherOrderComponent} = wp.compose;
const {Fragment} = wp.element;
const {InspectorControls} = wp.blockEditor;
const {PanelBody, SelectControl} = wp.components;

/**
 * Add width attribute to the Group block
 * @param settings
 * @param name
 * @returns {*}
 */
const addGroupWidthAttribute = (settings, name) => {
  if (typeof settings.attributes !== 'undefined') {
    if (name === 'core/group') {
      settings.attributes = Object.assign(settings.attributes, {
        groupWidth: {
          type: 'string',
        }
      });
    }
  }
  return settings;
}

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'headless-horseman/group-block/add-attribute',
  addGroupWidthAttribute
);

/**
 * Add controls to the Group block sidebar
 */
const groupWidthControls = createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    const {attributes, setAttributes} = props;
    const {groupWidth} = attributes;

    return (
      <Fragment>
        <BlockEdit {...props} />
        {props.name === 'core/group' &&
          <InspectorControls>
            <PanelBody
              title={__('Width')}
            >
              <SelectControl
                label={__('Available options:')}
                value={groupWidth}
                options={[
                  {
                    label: __('Fixed'),
                    value: 'fixed'
                  },
                  {
                    label: __('Full'),
                    value: 'full'
                  }
                ]}
                onChange={(value) => {
                  setAttributes({
                    groupWidth: value,
                  });
                }}
              />
            </PanelBody>
          </InspectorControls>
        }
      </Fragment>
    );
  };
}, 'groupWidthControls');

wp.hooks.addFilter(
  'editor.BlockEdit',
  'headless-horseman/group-block/add-controls',
  groupWidthControls
);

/**
 * Add custom class to block in Edit
 */
const groupWidthControlsProp = createHigherOrderComponent((BlockListBlock) => {
  return (props) => {
    if (props.name !== 'core/group') {
      return (
        <BlockListBlock {...props} />
      );
    }

    const {attributes} = props;
    const {groupWidth} = attributes;

    if (groupWidth) {
      return <BlockListBlock {...props} className={'is-' + groupWidth}/>
    } else {
      return <BlockListBlock {...props} />
    }
  };
}, 'groupWidthControlsProp');

wp.hooks.addFilter(
  'editor.BlockListBlock',
  'headless-horseman/group-block/select-prop',
  groupWidthControlsProp
);

/**
 * Save the selected option
 * @param extraProps
 * @param blockType
 * @param attributes
 * @returns {*}
 */
const saveGroupWidthAttribute = (extraProps, blockType, attributes) => {
  if (blockType.name === 'core/group') {
    const {groupWidth} = attributes;
    if (groupWidth) {
      extraProps.className = classnames(extraProps.className, 'is-' + groupWidth)
    }
  }

  return extraProps;
};
wp.hooks.addFilter(
  'blocks.getSaveContent.extraProps',
  'headless-horseman/group-block/save-attribute',
  saveGroupWidthAttribute
);
