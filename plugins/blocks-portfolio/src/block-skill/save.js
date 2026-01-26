import { useBlockProps } from '@wordpress/block-editor';

export default function save({ attributes, clientId }) {
  const { skillIcon, skillPercentage, skillLabel, imageUrl, imageDescription } = attributes;

  if (imageUrl) {
    const descId = `skill-desc-${clientId}`;

    const glightboxConfig = imageDescription
      ? `title: ${skillLabel}; description: .${descId}; descPosition: right;`
      : `title: ${skillLabel};`;

    return (
      <>
        <a
          {...useBlockProps.save({
            className: 'skill-card glightbox-skill',
          })}
          href={imageUrl}
          data-gallery="skill-gallery"
          data-glightbox={glightboxConfig}
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
    );
  }

  return (
    <div {...useBlockProps.save({ className: 'skill-card-editor' })}>
      <div className="skill-icon">{skillIcon}</div>
      <div className="skill-percentage">{skillPercentage}</div>
      <div className="skill-label">{skillLabel}</div>
    </div>
  );
}
