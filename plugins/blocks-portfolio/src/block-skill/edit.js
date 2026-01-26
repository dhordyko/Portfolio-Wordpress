import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import './editor.scss';

export default function Edit({ attributes, setAttributes, clientId }) {
  const { skillIcon, skillPercentage, skillLabel, imageUrl, imageDescription } = attributes;

  const descId = `skill-desc-${clientId}`;

  const glightboxConfig = imageDescription
    ? `title: ${skillLabel}; description: .${descId}; descPosition: right;`
    : `title: ${skillLabel};`;

  const linkProps = useBlockProps({
    className: 'skill-card glightbox-skill',
  });

  const wrapperProps = useBlockProps({
    className: 'skill-card-editor',
  });

  return (
    <>
      <InspectorControls>
        <PanelBody title={__('Skill Settings', 'blocks-portfolio')} initialOpen={true}>
          <TextControl
            label={__('Skill Icon/Symbol', 'blocks-portfolio')}
            value={skillIcon}
            onChange={(value) => setAttributes({ skillIcon: value })}
            placeholder={__('Enter emoji or icon', 'blocks-portfolio')}
          />
          <TextControl
            label={__('Skill Percentage', 'blocks-portfolio')}
            value={skillPercentage}
            onChange={(value) => setAttributes({ skillPercentage: value })}
            placeholder={__('92%', 'blocks-portfolio')}
          />
          <TextControl
            label={__('Skill Label', 'blocks-portfolio')}
            value={skillLabel}
            onChange={(value) => setAttributes({ skillLabel: value })}
            placeholder={__('Figma', 'blocks-portfolio')}
          />
          <TextControl
            label={__('Popup Image URL (optional)', 'blocks-portfolio')}
            value={imageUrl}
            onChange={(value) => setAttributes({ imageUrl: value })}
            placeholder={__('https://example.com/image.jpg', 'blocks-portfolio')}
          />
          <TextControl
            label={__('Image Description (for Lightbox)', 'blocks-portfolio')}
            value={imageDescription}
            onChange={(value) => setAttributes({ imageDescription: value })}
          />
        </PanelBody>
      </InspectorControls>

      {imageUrl ? (
        <>
          <a
            {...linkProps}
            href={imageUrl}                 // ✅ required
            data-gallery="skill-gallery"
            data-glightbox={glightboxConfig}
            onClick={(e) => e.preventDefault()} // ✅ prevents navigating away in editor
          >
            <div className="skill-icon">{skillIcon}</div>
            <div className="skill-percentage">{skillPercentage}</div>
            <div className="skill-label">{skillLabel}</div>
          </a>

          {imageDescription && (
            <div className={descId} style={{ display: 'none' }}>
              {imageDescription}
            </div>
          )}
        </>
      ) : (
        <div {...wrapperProps}>
          <div className="skill-icon">{skillIcon}</div>
          <div className="skill-percentage">{skillPercentage}</div>
          <div className="skill-label">{skillLabel}</div>
        </div>
      )}
    </>
  );
}
